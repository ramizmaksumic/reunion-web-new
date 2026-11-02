<?php

namespace App\Livewire;

use App\Mail\ProjectInquiryMail;
use App\Support\InquiryQuestions;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProjectInquiry extends Component
{
    use WithFileUploads;

    #[Locked]
    public int $step = 1;

    #[Locked]
    public bool $sent = false;

    #[Locked]
    public string $submissionId;

    public string $service = '';

    public array $answers = [];

    public string $name = '';

    public string $company = '';

    public string $email = '';

    public string $phone = '';

    public string $website = '';

    public $attachment;

    public function mount(): void
    {
        $service = request()->query('service');
        $this->service = is_string($service) && isset(InquiryQuestions::services()[$service]) ? $service : '';
        $this->submissionId = (string) Str::uuid();
        $this->initializeCheckboxAnswers();
    }

    public function updatedService(): void
    {
        $this->answers = array_intersect_key($this->answers, array_flip(['description', 'start']));
        $this->initializeCheckboxAnswers();
        $this->resetValidation();
    }

    private function initializeCheckboxAnswers(): void
    {
        foreach (InquiryQuestions::fields($this->service) as $key => $question) {
            if ($question['type'] === 'multi' && ! is_array($this->answers[$key] ?? null)) {
                $this->answers[$key] = [];
            }
        }
    }

    private function serviceRules(): array
    {
        return ['service' => ['required', Rule::in(array_keys(InquiryQuestions::services()))]];
    }

    private function answerRules(): array
    {
        $rules = [];
        foreach (InquiryQuestions::visible($this->service, $this->answers) as $key => $q) {
            $field = 'answers.'.$key;
            $rules[$field] = [$q['optional'] ? 'nullable' : 'required'];
            if ($q['type'] === 'multi') {
                $rules[$field] = [...$rules[$field], 'array', 'max:10'];
                $rules[$field.'.*'] = ['string', 'distinct', Rule::in($q['options'])];
            } else {
                $rules[$field][] = 'string';
                $rules[$field][] = 'max:'.($q['type'] === 'textarea' ? 4000 : 500);
                if ($q['options']) {
                    $rules[$field][] = Rule::in($q['options']);
                }
                if ($q['type'] === 'url') {
                    $rules[$field][] = 'url:http,https';
                }
            }
        }

        return $rules;
    }

    protected function messages(): array
    {
        return ['required' => 'Ovo polje je obavezno.', 'email' => 'Unesite ispravnu email adresu.', 'url' => 'Unesite ispravnu http ili https adresu.', 'in' => 'Odaberite ponuđenu vrijednost.', 'max' => 'Unos prelazi dozvoljenu veličinu (:max).', 'string' => 'Unesite tekst.', 'array' => 'Odaberite ponuđene vrijednosti.', 'mimes' => 'Dozvoljeni su PDF, DOC, DOCX, JPG i PNG dokumenti.', 'mimetypes' => 'Vrsta dokumenta nije dozvoljena.', 'file' => 'Odaberite ispravan dokument.', 'distinct' => 'Vrijednosti se ne smiju ponavljati.'];
    }

    public function next(): void
    {
        $this->validate($this->serviceRules());
        if ($this->step === 2) {
            $this->validate($this->answerRules());
        }
        $this->step = min(3, $this->step + 1);
        $this->dispatch('inquiry-step');
    }

    public function back(): void
    {
        $this->step = max(1, $this->step - 1);
        $this->resetValidation();
        $this->dispatch('inquiry-step');
    }

    public function restoreDraft($draft): void
    {
        if (! is_array($draft) || ! is_string($draft['service'] ?? null) || ! isset(InquiryQuestions::services()[$draft['service']]) || ! is_array($draft['answers'] ?? null) || count($draft['answers']) > 30) {
            return;
        }
        if ($this->service && $this->service !== $draft['service']) {
            return;
        }
        $this->service = $draft['service'];
        $safe = [];
        foreach (InquiryQuestions::fields($this->service) as $key => $q) {
            $value = $draft['answers'][$key] ?? null;
            if ($q['options']) {
                if ($q['type'] === 'multi' && is_array($value) && count($value) <= 10) {
                    $safe[$key] = array_values(array_unique(array_filter($value, fn ($v) => is_string($v) && in_array($v, $q['options'], true))));
                } elseif ($q['type'] !== 'multi' && is_string($value) && in_array($value, $q['options'], true)) {
                    $safe[$key] = $value;
                }
            } elseif (is_string($value) && mb_strlen($value) <= ($q['type'] === 'textarea' ? 4000 : 500)) {
                if ($q['type'] !== 'url' || Validator::make(['url' => $value], ['url' => 'nullable|url:http,https'])->passes()) {
                    $safe[$key] = $value;
                }
            }
        }
        $this->answers = array_intersect_key($safe, InquiryQuestions::visible($this->service, $safe));
        $this->initializeCheckboxAnswers();
    }

    public function submit(): void
    {
        if ($this->sent) {
            return;
        }
        $key = 'inquiry:'.hash('sha256', request()->ip() ?? 'unknown');
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $this->addError('submission', 'Previše pokušaja. Pokušajte ponovo za nekoliko minuta.');

            return;
        }
        RateLimiter::hit($key, 600);
        if ($this->website !== '') {
            $this->addError('submission', 'Upit nije moguće poslati. Pokušajte ponovo.');

            return;
        }
        $this->validate($this->serviceRules());
        $this->step = 2;
        $this->validate($this->answerRules());
        $this->step = 3;
        $this->validate([
            'name' => 'required|string|max:255', 'company' => 'nullable|string|max:255',
            'email' => 'required|email:rfc|max:255', 'phone' => 'nullable|string|max:40',
            'attachment' => 'nullable|file|max:4096|mimes:pdf,doc,docx,jpg,jpeg,png|mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/jpeg,image/png',
        ]);
        $lock = Cache::lock('inquiry-lock:'.$this->submissionId, 120);
        if (! $lock->get()) {
            return;
        }
        try {
            if (Cache::has('inquiry-sent:'.$this->submissionId)) {
                $this->sent = true;

                return;
            }
            $recipient = config('inquiry.recipient');
            if (! is_string($recipient) || ! filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
                throw new \RuntimeException('Recipient unavailable');
            }
            // A logging transport would retain the complete private message and cannot deliver it.
            $mailer = config('mail.mailers.'.config('mail.default'));
            if (in_array($mailer['transport'] ?? '', ['log', 'failover', 'roundrobin'], true)) {
                throw new \RuntimeException('Configure a direct delivery transport');
            }
            $rows = [];
            foreach (InquiryQuestions::visible($this->service, $this->answers) as $key => $q) {
                $value = $this->answers[$key] ?? null;
                if ($value !== null && $value !== '' && $value !== []) {
                    $rows[$q['label']] = is_array($value) ? implode(', ', $value) : $value;
                }
            }
            $message = new ProjectInquiryMail(InquiryQuestions::services()[$this->service], $rows, ['name' => $this->name, 'company' => $this->company, 'email' => $this->email, 'phone' => $this->phone], now()->toIso8601String());
            if ($this->attachment) {
                $ext = $this->attachment->guessExtension();
                $message->attachData($this->attachment->get(), 'projektna-dokumentacija.'.$ext, ['mime' => $this->attachment->getMimeType()]);
            }
            $result = Mail::to($recipient)->send($message);
            if (! app()->runningUnitTests() && ($result === null || ($mailer['transport'] ?? '') === 'array')) {
                throw new \RuntimeException('Delivery not accepted');
            }
            Cache::put('inquiry-sent:'.$this->submissionId, true, now()->addDay());
            $this->sent = true;
            if ($this->attachment) {
                try {
                    $this->attachment->delete();
                } catch (\Throwable) {
                    // Scheduled cleanup will retry; delivery has already succeeded.
                }
            }
            $this->reset('attachment', 'name', 'company', 'email', 'phone', 'answers');
            $this->dispatch('inquiry-sent');
        } catch (\Throwable $e) {
            // Deliberately do not log exception messages or submitted data.
            $this->addError('submission', 'Slanje trenutno nije uspjelo. Vaši odgovori su sačuvani u obrascu. Pokušajte ponovo.');
        } finally {
            $lock->release();
        }
    }

    public function render()
    {
        return view('livewire.project-inquiry', ['services' => InquiryQuestions::services(), 'questions' => InquiryQuestions::visible($this->service, $this->answers)]);
    }
}
