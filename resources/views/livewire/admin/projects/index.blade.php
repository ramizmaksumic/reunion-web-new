<div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Projekti</h1>

        <button
            wire:click="create"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            + Novi projekt
        </button>
    </div>

    {{-- TABLE --}}
    <table class="w-full text-sm bg-gray-800 rounded overflow-hidden">
        <thead class="bg-gray-700 text-gray-300">
            <tr>
                <th class="p-3 text-left text-gray-100">Naziv</th>
                <th class="p-3 text-left text-gray-100">Kategorija</th>
                <th class="p-3 text-gray-100">Featured</th>
                <th class="p-3 w-40 text-gray-100">Akcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr class="border-t border-gray-700">
                <td class="p-3 text-gray-100">{{ $project->name }}</td>
                <td class="p-3 text-gray-100">{{ $project->category->name ?? '-' }}</td>
                <td class="p-3 text-gray-100 text-center">
                    @if($project->is_featured)
                    ⭐
                    @endif
                </td>
                <td class="p-3 space-x-2">
                    <button wire:click="edit({{ $project->id }})" class="text-blue-400">Edit</button>
                    <button
                        wire:click="confirmDelete({{ $project->id }})"
                        class="text-red-400">
                        Delete
                    </button>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- MODAL --}}
    @if($showModal)
    <div class="fixed inset-0 bg-black/70 flex items-center justify-center z-50">
        <div class="bg-gray-900 p-6 rounded w-[500px]">
            <h2 class="text-lg mb-4 text-gray-100">
                {{ $projectId ? 'Uredi projekt' : 'Novi projekt' }}
            </h2>

            <div class="space-y-4">
                <input
                    wire:model.defer="name"
                    class="w-full bg-gray-800 border border-gray-700 p-2 rounded text-gray-100"
                    placeholder="Naziv projekta" />

                <textarea
                    wire:model.defer="description"
                    class="w-full bg-gray-800 border border-gray-700 p-2 rounded text-gray-100"
                    placeholder="Opis projekta"></textarea>

                <select
                    wire:model.defer="category_id"
                    class="w-full bg-gray-800 border border-gray-700 p-2 rounded text-gray-100">
                    <option value="">-- Odaberite kategoriju --</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                {{-- TAGOVI --}}
                <div>
                    <label class="block text-sm mb-2 text-gray-100">
                        Tagovi projekta
                    </label>

                    <div class="flex flex-wrap gap-2">
                        @foreach($tags as $tag)
                        <label
                            class="flex items-center gap-2 bg-gray-800 border border-gray-700 px-3 py-1 rounded cursor-pointer text-gray-100 text-sm">

                            <input
                                type="checkbox"
                                wire:model.defer="selectedTags"
                                value="{{ $tag->id }}"
                                class="rounded border-gray-600 text-blue-500 focus:ring-0">

                            {{ $tag->name }}
                        </label>
                        @endforeach
                    </div>

                    @error('selectedTags')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <input
                    wire:model.defer="link"
                    class="w-full bg-gray-800 border border-gray-700 p-2 rounded text-gray-100"
                    placeholder="Link projekta (opcionalno)" />

                <!-- Slika projekta -->

                <div>
                    <label class="block text-sm mb-1 text-gray-100">Slika projekta</label>

                    <input
                        type="file"
                        wire:model="image"
                        class="w-full text-sm text-gray-100" />

                    @error('image')
                    <p class="text-red-400 text-sm">{{ $message }}</p>
                    @enderror

                    {{-- Preview nove slike --}}
                    @if ($image)
                    <img src="{{ $image->temporaryUrl() }}" class="mt-2 h-32 rounded">
                    @elseif ($existingImage)
                    <img src="{{ asset('storage/' . $existingImage) }}" class="mt-2 h-32 rounded">
                    @endif
                </div>

                <!-- GALERIJA -->
                <label class="block text-sm mb-1 text-gray-100">Galerija</label>
                <div>
                    <input
                        type="file"
                        wire:model.defer="images"
                        multiple
                        accept="image/*"
                        class="w-full text-sm text-gray-100" />
                    @error('images')
                    <p class="text-red-400 text-sm">{{ $message }}</p>
                    @enderror
                </div>


                <label class="flex items-center gap-2 text-gray-100">
                    <input type="checkbox" wire:model.defer="is_featured">
                    Istaknuti projekt
                </label>

                @error('name') <p class="text-red-400 text-sm">{{ $message }}</p> @enderror
                @error('category_id') <p class="text-red-400 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="flex justify-end gap-2 mt-6">
                <button wire:click="$set('showModal', false)" class="bg-red-600 px-4 py-2 rounded text-white">Otkaži</button>
                <button wire:click="save" class="bg-blue-600 px-4 py-2 rounded text-white">
                    Sačuvaj
                </button>
            </div>
        </div>
    </div>
    @endif

    @if($confirmingDelete)
    <div class="fixed inset-0 bg-black/70 flex items-center justify-center z-50">
        <div class="bg-gray-900 p-6 rounded w-96">
            <h2 class="text-lg font-semibold mb-4 text-red-400">
                Potvrda brisanja
            </h2>

            <p class="text-sm text-gray-300 mb-6">
                Da li ste sigurni da želite obrisati ovaj projekt?
                <br>
                <span class="text-red-400">Ova akcija je nepovratna.</span>
            </p>

            <div class="flex justify-end gap-3">
                <button
                    wire:click="$set('confirmingDelete', false)"
                    class="px-4 py-2 bg-amber-600 text-gray-100">
                    Otkaži
                </button>

                <button
                    wire:click="delete"
                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                    Obriši
                </button>
            </div>
        </div>
    </div>
    @endif
</div>