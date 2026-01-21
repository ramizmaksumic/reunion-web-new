<div class="space-y-6">

    {{-- HEADER --}}
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-bold">Tagovi</h2>

        <button
            wire:click="create"
            class="bg-gray-900 text-white px-4 py-2 rounded">
            + Novi tag
        </button>
    </div>

    {{-- TABLE --}}
    <div class="bg-white rounded shadow">
        <table class="w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">Naziv</th>
                    <th class="p-3 text-left">Slug</th>
                    <th class="p-3 text-right">Akcije</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tags as $tag)
                <tr class="border-t">
                    <td class="p-3">{{ $tag->name }}</td>
                    <td class="p-3 text-gray-500">{{ $tag->slug }}</td>
                    <td class="p-3 text-right space-x-2">
                        <button wire:click="edit({{ $tag->id }})" class="text-blue-600">Edit</button>
                        <button wire:click="confirmDelete({{ $tag->id }})" class="text-red-600">Delete</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="p-6 text-center text-gray-500">
                        Nema tagova
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- MODAL --}}
    @if($showModal)
    <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white w-full max-w-md rounded-lg p-6 space-y-4">

            <h3 class="text-lg font-semibold">
                {{ $tagId ? 'Uredi tag' : 'Novi tag' }}
            </h3>

            <input
                wire:model.defer="name"
                type="text"
                placeholder="Naziv taga"
                class="w-full border rounded p-2">

            <input
                wire:model.defer="slug"
                type="text"
                placeholder="Slug (opcionalno)"
                class="w-full border rounded p-2">

            @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

            <div class="flex justify-end gap-2 pt-4">
                <button wire:click="$set('showModal', false)" class="border px-4 py-2 rounded">
                    Cancel
                </button>

                <button wire:click="save" class="bg-gray-900 text-white px-4 py-2 rounded">
                    Save
                </button>
            </div>
        </div>
    </div>
    @endif

    {{-- CONFIRM DELETE --}}
    @if($confirmingDelete)
    <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 space-y-4">
            <p>Obrisati ovaj tag?</p>

            <div class="flex justify-end gap-2">
                <button wire:click="$set('confirmingDelete', false)" class="border px-4 py-2 rounded">
                    Cancel
                </button>

                <button wire:click="delete" class="bg-red-600 text-white px-4 py-2 rounded">
                    Obriši
                </button>
            </div>
        </div>
    </div>
    @endif

</div>