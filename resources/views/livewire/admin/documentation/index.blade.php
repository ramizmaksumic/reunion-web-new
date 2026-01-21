<div class="flex gap-6">




    {{-- TREE --}}
    <div class="w-1/3 bg-gray-800 p-4 rounded">
        <h2 class="text-gray-100 mb-4 font-bold">
            Dokumentacija – {{ $project->name }}
        </h2>

        <button
            wire:click="create"
            class="mb-4 bg-blue-600 px-3 py-1 rounded text-white">
            + Nova stavka
        </button>

        <ul class="space-y-2">
            @foreach($nodes as $node)
            @include('admin.projects.partials.node-admin', ['node' => $node])
            @endforeach
        </ul>
    </div>

    {{-- FORM --}}
    @if($showModal)
    <div class="w-2/3 bg-gray-900 p-6 rounded">
        <h3 class="text-gray-100 mb-4">
            {{ $nodeId ? 'Uredi stavku' : 'Nova stavka' }}
        </h3>

        <div class="space-y-4">
            <input wire:model="name" class="w-full bg-gray-800 p-2 rounded" placeholder="Naziv">

            <select wire:model="type" class="w-full bg-gray-800 p-2 rounded">
                <option value="section">Sekcija</option>
                <option value="text">Tekst</option>
                <option value="file">Fajl</option>
            </select>

            @if($type === 'text')
            <textarea wire:model="content" class="w-full bg-gray-800 p-2 rounded" rows="6"></textarea>
            @endif

            @if($type === 'file')
            <input type="file" wire:model="file">
            @endif

            <label class="flex items-center gap-2 text-gray-100">
                <input type="checkbox" wire:model="is_public">
                Javno vidljivo
            </label>

            <div class="flex gap-2">
                <button wire:click="save" class="bg-green-600 px-4 py-2 rounded text-white">
                    Sačuvaj
                </button>
                <button wire:click="$set('showModal', false)" class="bg-red-600 px-4 py-2 rounded text-white">
                    Otkaži
                </button>
            </div>
        </div>
    </div>
    @endif

</div>