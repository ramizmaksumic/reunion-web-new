<div x-data="{
    draftEnabled: false,
    init() {
        this.$watch('draftEnabled', enabled => {
            if (enabled) this.saveDraft();
            else { try { sessionStorage.removeItem('reunion-inquiry:v1'); } catch (_) {} }
        });
        this.$watch('$wire.answers', () => this.saveDraft());
        this.$watch('$wire.service', () => this.saveDraft());
        try {
            const saved = sessionStorage.getItem('reunion-inquiry:v1');
            if (saved && saved.length < 60000) {
                this.$wire.restoreDraft(JSON.parse(saved)).then(() => { this.draftEnabled = true; });
            }
        } catch (_) {}
    },
    saveDraft() {
        if (!this.draftEnabled || this.$wire.sent) return;
        try { sessionStorage.setItem('reunion-inquiry:v1', JSON.stringify({service: this.$wire.service, answers: this.$wire.answers})); } catch (_) {}
    },
    clearDraft() { this.draftEnabled = false; try { sessionStorage.removeItem('reunion-inquiry:v1'); } catch (_) {} }
}" x-on:inquiry-sent.window="clearDraft()" x-on:inquiry-step.window="$nextTick(() => $refs.heading.focus())">
@if($sent)
    <div role="status" class="bg-secondary rounded-2xl p-8"><h2 class="font-heading text-xl">Vaš upit je uspješno poslan!</h2><p class="mt-4">Hvala vam. Naš tim će pregledati vaše zahtjeve i javiti vam se.</p></div>
@else
    <ol aria-label="Koraci obrasca" class="grid grid-cols-1 sm:grid-cols-3 gap-3 mb-8">
        @foreach(['Odabir usluge', 'Detalji projekta', 'Kontakt podaci i slanje'] as $label)
        <li @if($step === $loop->iteration) aria-current="step" @endif class="rounded-xl p-4 {{ $step === $loop->iteration ? 'bg-primary text-white' : 'bg-secondary' }}">{{ $loop->iteration }}. {{ $label }}</li>
        @endforeach
    </ol>
    <h2 x-ref="heading" tabindex="-1" class="font-heading text-xl mb-6">Korak {{ $step }} od 3</h2>
    <label class="flex gap-3 mb-6"><input type="checkbox" x-model="draftEnabled" class="mt-1"> <span>Privremeno sačuvaj projektne odgovore u ovoj kartici preglednika radi oporavka nakon osvježavanja. Kontakt podaci i dokumenti se ne čuvaju. U opis projekta ne unosite osjetljive podatke.</span></label>
    @if($errors->any())
    <div role="alert" class="bg-secondary border border-red-700 rounded-xl p-4 mb-6">
        <p class="font-medium text-red-700">Provjerite označena polja prije nastavka.</p>
        <ul class="list-disc pl-5">
        @foreach($errors->getMessages() as $field => $messages)
            @php($questionKey = explode('.', $field)[1] ?? '')
            <li>
                @if(isset($questions[$questionKey]))
                    <a class="underline text-red-700" href="#error-{{ $questionKey }}">{{ $questions[$questionKey]['label'] }}: {{ $messages[0] }}</a>
                @else
                    <span class="text-red-700">{{ $messages[0] }}</span>
                @endif
            </li>
        @endforeach
        </ul>
    </div>
    @endif
    <form wire:submit="{{ $step === 3 ? 'submit' : 'next' }}" novalidate class="space-y-6">
        @if($step === 1)
        <fieldset><legend class="font-medium text-xl mb-4">Koja usluga vas zanima?</legend>
        <div class="grid sm:grid-cols-2 gap-4">
            @foreach($services as $value => $label)
            <label class="flex items-center gap-3 bg-secondary rounded-xl p-5 cursor-pointer focus-within:ring-2 focus-within:ring-primary"><input type="radio" wire:model.live="service" value="{{ $value }}">{{ $label }}</label>
            @endforeach
        </div>
        @error('service')<p role="alert" class="text-red-700 mt-2">{{ $message }}</p>@enderror
        </fieldset>
        @elseif($step === 2)
            <p class="text-primary font-medium">{{ $services[$service] ?? '' }}</p>
            @foreach($questions as $key => $question)
            <div wire:key="question-{{ $service }}-{{ $key }}">
                @include('livewire.inquiry-question')
            </div>
            @endforeach
        @else
            @foreach(['name' => ['Ime i prezime', 'text', 'name', 255], 'company' => ['Naziv firme (opcionalno)', 'text', 'organization', 255], 'email' => ['Email', 'email', 'email', 255], 'phone' => ['Telefon (opcionalno)', 'tel', 'tel', 40]] as $key => $field)
            <div><label for="inquiry-{{ $key }}" class="block font-medium mb-2">{{ $field[0] }}</label>
            <input id="inquiry-{{ $key }}" wire:model="{{ $key }}" type="{{ $field[1] }}" autocomplete="{{ $field[2] }}" maxlength="{{ $field[3] }}" @if(in_array($key, ['name','email'])) required @endif aria-describedby="error-{{ $key }}" aria-invalid="{{ $errors->has($key) ? 'true' : 'false' }}" class="w-full bg-secondary rounded-xl p-3 focus:ring-2 focus:ring-primary">
            @error($key)<p id="error-{{ $key }}" role="alert" class="text-red-700">{{ $message }}</p>@enderror</div>
            @endforeach
            <div><label for="inquiry-document" class="block font-medium mb-2">Projektna dokumentacija (opcionalno)</label>
            <input id="inquiry-document" wire:model="attachment" type="file" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" aria-describedby="document-help document-error" class="w-full bg-secondary p-3 rounded-xl focus:ring-2 focus:ring-primary">
            <p id="document-help">Jedan PDF, DOC, DOCX, JPG ili PNG dokument, najviše 4 MB.</p>
            <p wire:loading wire:target="attachment" role="status">Dokument se učitava…</p>
            @error('attachment')<p id="document-error" role="alert" class="text-red-700">{{ $message }}</p>@enderror</div>
            <p class="bg-secondary p-4 rounded-xl">Kontakt podatke i projektne odgovore koristimo za obradu vašeg upita i pripremu ponude.
                @if(config('inquiry.privacy_url'))<a class="underline text-primary" href="{{ config('inquiry.privacy_url') }}">Politika privatnosti</a>
                @else<span>Politika privatnosti: poveznica će biti dostupna nakon objave.</span>@endif
            </p>
        @endif
        <div style="position:absolute;left:-10000px" aria-hidden="true"><label for="inquiry-website">Ostavite prazno</label><input id="inquiry-website" wire:model="website" type="text" tabindex="-1" autocomplete="off"></div>
        @error('submission')<p role="alert" class="text-red-700">{{ $message }}</p>@enderror
        <div class="flex flex-wrap gap-4 pt-4">
            @if($step > 1)<button type="button" wire:click="back" wire:loading.attr="disabled" class="bg-secondary px-8 py-3 rounded-xl focus:ring-2 focus:ring-primary disabled:opacity-50">Nazad</button>@endif
            <button type="submit" wire:loading.attr="disabled" wire:target="next,submit,attachment,back" class="bg-primary text-white px-8 py-3 rounded-xl hover:opacity-90 focus:ring-2 focus:ring-primary focus:ring-offset-2 disabled:opacity-50">{{ $step === 3 ? 'Pošalji upit' : 'Nastavi' }} &rarr;</button>
            <span wire:loading wire:target="submit" role="status">Slanje upita…</span>
        </div>
    </form>
@endif
</div>
