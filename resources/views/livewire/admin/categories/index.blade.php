<div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Kategorije</h1>

        <button
            wire:click="$set('showModal', true)"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            + Nova kategorija
        </button>
    </div>

    {{-- TABLE --}}
    <table class="w-full text-sm bg-gray-800 rounded overflow-hidden">
        <thead class="bg-gray-700 text-gray-100">
            <tr>
                <th class="p-3 text-left">Naziv</th>
                <th class="p-3 w-32">Akcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr class="border-t border-gray-700">
                <td class="p-3 text-gray-100">{{ $category->name }}</td>
                <td class="p-3 space-x-2">
                    <button wire:click="edit({{ $category->id }})" class="text-blue-400">Edit</button>
                    <button wire:click="delete({{ $category->id }})" class="text-red-400">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @error('delete')
    <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
    @enderror

    {{-- MODAL --}}
    @if($showModal)
    <div class="fixed inset-0 bg-black/70 flex items-center justify-center z-50">
        <div class="bg-gray-900 p-6 rounded w-96">
            <h2 class="text-lg mb-4 text-gray-100">
                {{ $editingId ? 'Uredi kategoriju' : 'Nova kategorija' }}
            </h2>

            <input
                wire:model.defer="name"
                class="w-full bg-gray-800 border border-gray-700 p-2 rounded mb-4 text-gray-100"
                placeholder="Naziv kategorije" />

            @error('name')
            <p class="text-red-400 text-sm mb-2">{{ $message }}</p>
            @enderror

            <div class="flex justify-end gap-2">
                <button wire:click="$set('showModal', false)" class="bg-red-600 px-4 py-2 rounded text-white">Otkaži</button>
                <button wire:click="save" class="bg-blue-600 px-4 py-2 rounded text-white">
                    Sačuvaj
                </button>
            </div>
        </div>
    </div>
    @endif
</div>