<?php

namespace Tests\Feature;

use App\Livewire\ProjectInquiry;
use App\Mail\ProjectInquiryMail;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class ProjectInquiryTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        config(['inquiry.recipient' => 'admin@example.test', 'mail.default' => 'array']);
        Cache::flush();
        Mail::fake();
    }

    private function ready()
    {
        return Livewire::test(ProjectInquiry::class)
            ->set('service', 'other')
            ->set('answers', ['kind' => 'Analiza', 'goal' => 'Bolja prodaja', 'start' => 'Kasnije'])
            ->call('next')->call('next')
            ->set('name', 'Test Korisnik')->set('email', 'test@example.test');
    }

    public function test_page_loads_without_google_or_duplicate_alpine(): void
    {
        $this->withoutVite()->get('/zatrazi-ponudu')->assertOk()->assertSee('Zatražite ponudu')->assertDontSee('google.com/recaptcha');
    }

    public function test_service_parameters_are_allowlisted(): void
    {
        Livewire::withQueryParams(['service' => 'web'])->test(ProjectInquiry::class)->assertSet('service', 'web');
        Livewire::withQueryParams(['service' => 'invalid'])->test(ProjectInquiry::class)->assertSet('service', '');
        Livewire::withQueryParams(['service' => ['web']])->test(ProjectInquiry::class)->assertSet('service', '');
    }

    public function test_steps_validate_and_preserve_answers(): void
    {
        Livewire::test(ProjectInquiry::class)->call('next')->assertHasErrors('service')
            ->set('service', 'other')->call('next')->call('next')->assertHasErrors('answers.kind')
            ->set('answers', ['kind' => 'Analiza', 'goal' => 'Rezultat', 'start' => 'Kasnije'])
            ->call('next')->assertSet('step', 3)->call('back')->assertSet('answers.kind', 'Analiza')->call('next')->assertSet('step', 3);
    }

    public function test_conditional_fields_and_service_changes(): void
    {
        Livewire::test(ProjectInquiry::class)->set('service', 'web')->call('next')
            ->assertDontSee('Adresa postojeće web stranice')->set('answers.existing', 'Da')
            ->assertSee('Adresa postojeće web stranice')->set('answers.url', 'https://example.test')
            ->set('service', 'seo')->assertSet('answers', []);
    }

    public function test_optional_budget_delivery_and_no_database_or_public_storage_writes(): void
    {
        Storage::fake('public');
        DB::shouldReceive('connection')->never();
        $this->ready()->call('submit')->assertHasNoErrors()->assertSet('sent', true)->call('submit');
        Mail::assertSent(ProjectInquiryMail::class, 1);
        $this->assertSame([], Storage::disk('public')->allFiles());
    }

    public function test_required_contact_and_invalid_options(): void
    {
        $this->ready()->set('name', '')->set('email', 'invalid')->call('submit')->assertHasErrors(['name', 'email'])->assertSet('sent', false);
        $this->ready()->set('answers.start', 'manipulated')->call('submit')->assertHasErrors('answers.start');
        Mail::assertNothingSent();
    }

    public function test_hidden_answers_and_arbitrary_keys_are_excluded(): void
    {
        $this->ready()->set('answers.url', 'secret')->set('answers.unexpected', 'hidden')->call('submit');
        Mail::assertSent(ProjectInquiryMail::class, fn ($mail) => ! in_array('secret', $mail->answers) && ! in_array('hidden', $mail->answers));
    }

    public function test_hidden_conditional_answer_is_excluded(): void
    {
        Livewire::test(ProjectInquiry::class)->set('service', 'web')->set('answers', [
            'existing' => 'Ne', 'url' => 'invalid-hidden', 'platform' => 'hidden', 'goal' => 'Nisam siguran', 'kind' => 'Nisam siguran',
            'content' => 'Ne', 'features' => ['Nisam siguran'], 'description' => 'Nova stranica', 'start' => 'Kasnije',
        ])->set('name', 'Test')->set('email', 'test@example.test')->call('submit')->assertHasNoErrors();
        Mail::assertSent(ProjectInquiryMail::class, fn ($mail) => ! in_array('invalid-hidden', $mail->answers) && ! in_array('hidden', $mail->answers));
    }

    public function test_drafts_are_filtered_and_do_not_restore_contact_or_hidden_answers(): void
    {
        Livewire::test(ProjectInquiry::class)->call('restoreDraft', ['service' => 'web', 'name' => 'Secret', 'answers' => ['existing' => 'Ne', 'url' => 'https://hidden.test', 'unknown' => 'secret']])
            ->assertSet('name', '')->assertSet('answers', ['existing' => 'Ne', 'features' => []]);
        Livewire::test(ProjectInquiry::class)->call('restoreDraft', ['service' => ['bad'], 'answers' => []])->assertSet('service', '');
    }

    public function test_invalid_and_oversized_attachments(): void
    {
        Storage::fake('inquiry-temporary');
        $this->ready()->set('attachment', UploadedFile::fake()->create('bad.exe', 10, 'application/x-executable'))->call('submit')->assertHasErrors('attachment');
        $this->ready()->set('attachment', UploadedFile::fake()->create('large.pdf', 4097, 'application/pdf'))->call('submit')->assertHasErrors('attachment');
        Mail::assertNothingSent();
    }

    public function test_valid_attachment_is_attached_with_safe_name_and_deleted(): void
    {
        Storage::fake('inquiry-temporary');
        $this->ready()->set('attachment', UploadedFile::fake()->createWithContent('unsafe-name.pdf', "%PDF-1.4\n1 0 obj\n<<>>\nendobj\n%%EOF"))
            ->call('submit')->assertHasNoErrors()->assertSet('sent', true);
        Mail::assertSent(ProjectInquiryMail::class, fn ($mail) => count($mail->rawAttachments) === 1 && $mail->rawAttachments[0]['name'] === 'projektna-dokumentacija.pdf');
        $this->assertSame([], Storage::disk('inquiry-temporary')->allFiles());
    }

    public function test_rate_limiting_and_honeypot(): void
    {
        $form = $this->ready()->set('website', 'spam');
        for ($i = 0; $i < 6; $i++) {
            $form->call('submit');
        }
        $form->assertHasErrors('submission')->assertSee('Previše pokušaja');
        Mail::assertNothingSent();
    }

    public function test_transport_failure_does_not_claim_success(): void
    {
        Mail::shouldReceive('to')->once()->andThrow(new \RuntimeException('private transport details'));
        $this->ready()->call('submit')->assertSet('sent', false)->assertHasErrors('submission')->assertDontSee('private transport details');
    }

    public function test_email_escapes_user_content(): void
    {
        $mail = new ProjectInquiryMail('Ostalo', ['Opis' => '<script>alert(1)</script>'], ['name' => '<b>Test</b>', 'email' => 'test@example.test', 'company' => '', 'phone' => ''], '2026-11-02');
        $this->assertStringContainsString('&lt;script&gt;', $mail->render());
        $this->assertStringNotContainsString('<script>', $mail->render());
    }

    public function test_every_service_accepts_valid_question_options(): void
    {
        foreach (\App\Support\InquiryQuestions::services() as $service => $label) {
            Cache::flush();
            $answers = [];
            foreach (\App\Support\InquiryQuestions::fields($service) as $key => $q) {
                if ($q['optional']) {
                    continue;
                }
                $answers[$key] = $q['type'] === 'multi' ? [$q['options'][0]] : ($q['options'][0] ?? ($q['type'] === 'url' ? 'https://example.test' : 'Projektni zahtjev'));
            }
            Livewire::test(ProjectInquiry::class)->set('service', $service)->set('answers', $answers)
                ->set('name', 'Test')->set('email', 'test@example.test')->call('submit')->assertHasNoErrors()->assertSet('sent', true);
        }
        Mail::assertSent(ProjectInquiryMail::class, 7);
    }

    public function test_cleanup_only_removes_expired_private_temporary_files(): void
    {
        Storage::fake('inquiry-temporary');
        Storage::fake('public');
        $disk = Storage::disk('inquiry-temporary');
        $disk->put('livewire-tmp/old.pdf', 'old');
        $disk->put('livewire-tmp/new.pdf', 'new');
        $disk->put('unrelated.pdf', 'keep');
        Storage::disk('public')->put('orders/historical.pdf', 'keep');
        touch($disk->path('livewire-tmp/old.pdf'), now()->subDays(2)->timestamp);
        $this->artisan('inquiry:cleanup-uploads')->assertSuccessful();
        $disk->assertMissing('livewire-tmp/old.pdf');
        $disk->assertExists('livewire-tmp/new.pdf');
        $disk->assertExists('unrelated.pdf');
        Storage::disk('public')->assertExists('orders/historical.pdf');
    }

    public function test_logging_transport_is_rejected_without_sending_private_data(): void
    {
        config(['mail.default' => 'log']);
        $this->ready()->call('submit')->assertSet('sent', false)->assertHasErrors('submission');
        Mail::assertNothingSent();
    }
}
