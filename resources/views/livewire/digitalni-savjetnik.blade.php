<div class="relative bg-white rounded-xl shadow-lg p-6 md:p-8">

    {{-- LOADING OVERLAY --}}
    <div
        wire:loading
        wire:target="submit"
        class="absolute inset-0 z-10 rounded-xl bg-white/80 backdrop-blur-sm flex items-center justify-center">
        <div class="flex flex-col items-center gap-3">
            <svg class="h-8 w-8 animate-spin text-secondary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v3a5 5 0 00-5 5H4z"></path>
            </svg>

            <p class="font-heading text-sm md:text-base text-gray-700">
                Analiziramo Vašu situaciju i pripremamo savjet...
            </p>
        </div>
    </div>

    @if(!$showResult)
    <form wire:submit.prevent="submit" class="space-y-6">

        {{-- Tip biznisa --}}
        <div>
            <label class="block font-heading font-semibold mb-2">Tip biznisa</label>
            <select wire:model="businessType" class="w-full border rounded-md p-3">
                <option value="">Izaberite</option>
                <option value="usluzni">Uslužni biznis</option>
                <option value="prodaja">Prodaja proizvoda</option>
                <option value="lokalni">Lokalni biznis</option>
                <option value="turizam">Turizam / ugostiteljstvo</option>
            </select>
            @error('businessType') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Grad --}}
        <div>
            <label class="block font-heading font-semibold mb-2">Grad / tržište</label>
            <input type="text" wire:model="city" class="w-full border rounded-md p-3">
            @error('city') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Web --}}
        <div>
            <label class="block font-heading font-semibold mb-2">Imate li web stranicu?</label>
            <div class="flex flex-wrap gap-4">
                <label class="inline-flex items-center gap-2">
                    <input type="radio" wire:model="hasWebsite" value="yes">
                    <span>Da</span>
                </label>

                <label class="inline-flex items-center gap-2">
                    <input type="radio" wire:model="hasWebsite" value="no">
                    <span>Ne</span>
                </label>

                <label class="inline-flex items-center gap-2">
                    <input type="radio" wire:model="hasWebsite" value="in_progress">
                    <span>U izradi</span>
                </label>
            </div>
            @error('hasWebsite') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Budžet --}}
        <div>
            <label class="block font-heading font-semibold mb-2">Mjesečni budžet</label>
            <select wire:model="budget" class="w-full border rounded-md p-3">
                <option value="">Izaberite</option>
                <option value="do_500">do 500 KM</option>
                <option value="500_1000">500 – 1.000 KM</option>
                <option value="1000_3000">1.000 – 3.000 KM</option>
                <option value="3000_plus">3.000+ KM</option>
            </select>
            @error('budget') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Problemi --}}
        <div>
            <label class="block font-heading font-semibold mb-2">Glavni problem</label>
            <div class="space-y-2">
                <label class="inline-flex items-center gap-2">
                    <input type="checkbox" wire:model="problems" value="no_leads">
                    <span>Nemamo dovoljno upita</span>
                </label><br>

                <label class="inline-flex items-center gap-2">
                    <input type="checkbox" wire:model="problems" value="bad_results">
                    <span>Web ne donosi rezultate</span>
                </label><br>

                <label class="inline-flex items-center gap-2">
                    <input type="checkbox" wire:model="problems" value="no_focus">
                    <span>Ne znamo šta nam je prioritet</span>
                </label>
            </div>
            @error('problems') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Pitanje --}}
        <div>
            <label class="block font-heading font-semibold mb-2">Vaše pitanje</label>
            <textarea
                wire:model="question"
                rows="4"
                class="w-full border rounded-md p-3"
                placeholder="Postavite jedno konkretno pitanje..."></textarea>
            @error('question') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- SUBMIT --}}
        <button
            type="submit"
            wire:loading.attr="disabled"
            wire:target="submit"
            class="bg-primary text-white font-heading font-semibold px-6 py-3 rounded-md disabled:opacity-60 disabled:cursor-not-allowed">
            <span wire:loading.remove wire:target="submit">Dobij savjet</span>
            <span wire:loading wire:target="submit">Pripremamo savjet…</span>
        </button>

    </form>
    @endif

    {{-- REZULTAT --}}
    @if($showResult)
    <div class="space-y-6">
        <h2 class="font-heading text-2xl font-bold">Preporuka</h2>

        <div class="p-4 bg-gray-50 rounded-md border">
            <strong>Dijagnoza:</strong> {{ $result['diagnosis'] }}
        </div>

        <div class="p-4 bg-gray-50 rounded-md border">
            <strong>Problem:</strong> {{ $result['issues'] }}
        </div>

        <div class="p-4 bg-gray-50 rounded-md border">
            <strong>Rješenje:</strong> {{ $result['solution'] }}
        </div>

        <div class="p-4 bg-gray-50 rounded-md border">
            <strong>Reunion pristup:</strong> {{ $result['reunion'] }}
        </div>

        <div class="p-4 bg-gray-50 rounded-md border">
            <strong>Sljedeći korak:</strong> {{ $result['next_step'] }}
        </div>

        <button wire:click="$set('showResult', false)" class="text-secondary underline">
            Postavi novo pitanje
        </button>
    </div>
    @endif

</div>