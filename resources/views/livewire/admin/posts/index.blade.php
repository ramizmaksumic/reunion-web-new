<div class="space-y-6">

    {{-- HEADER --}}
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-800">Postovi</h2>

        <a href="{{ route('admin.posts.create') }}"
            class="bg-black text-white px-4 py-2 rounded">
            + Novi post
        </a>
    </div>

    {{-- TABLE --}}
    <div class="bg-white rounded-md shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="p-3">Naslov</th>
                    <th class="p-3">Kategorija</th>
                    <th class="p-3">Slug</th>
                    <th class="p-3 text-right">Akcije</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $item)
                <tr class="border-t">
                    <td class="p-3 font-medium">{{ $item->title }}</td>
                    <td class="p-3 text-gray-600">
                        {{ $item->category?->name ?? '—' }}
                    </td>
                    <td class="p-3 text-gray-600">
                        {{ $item->slug }}
                    </td>
                    <td class="p-3 text-right space-x-2">


                        <button
                            wire:click="confirmDelete({{ $item->id }})"
                            class="text-red-600 hover:underline">
                            Delete
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="p-6 text-center text-gray-500">
                        Nema postova
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- MODAL --}}
    @if($showModal)
    <form wire:submit.prevent="save" enctype="multipart/form-data">
        <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
            <div class="bg-white w-full max-w-2xl rounded-lg p-6 space-y-4">

                <h3 class="text-lg font-semibold">
                    {{ $postId ? 'Uredi post' : 'Novi post' }}
                </h3>

                <div class="space-y-3">
                    <input
                        wire:model.defer="title"
                        type="text"
                        placeholder="Naslov"
                        class="w-full border rounded p-2">

                    <textarea
                        wire:model.defer="body"
                        rows="5"
                        placeholder="Sadržaj posta"
                        class="w-full border rounded p-2" id="editor"></textarea>

                    <!-- KATEGORIJE -->
                    <select wire:model.defer="category_id" class="w-full border rounded p-2">
                        <option value="">Bez kategorije</option>
                        @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    <!-- TAG -->
                    <select
                        wire:model.defer="tagIds"
                        multiple
                        class="w-full border rounded p-2">

                        @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                    <p class="text-xs text-gray-500">
                        Držite CTRL / CMD za odabir više tagova
                    </p>
                    <input wire:model="image" type="file">
                    <input wire:model="banner" type="file">
                </div>

                <div class="flex justify-end gap-2 pt-4">
                    <button
                        wire:click="$set('showModal', false)"
                        class="px-4 py-2 border rounded">
                        Cancel
                    </button>

                    <button
                        type="button"
                        wire:click="save"
                        class="px-4 py-2 bg-gray-900 text-white rounded">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </form>
    @error('image') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    @error('banner') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

    @endif

    {{-- CONFIRM DELETE --}}
    @if($confirmingDelete)
    <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 space-y-4">
            <p>Jeste li sigurni da želite obrisati ovaj post?</p>

            <div class="flex justify-end gap-2">
                <button
                    wire:click="$set('confirmingDelete', false)"
                    class="px-4 py-2 border rounded">
                    Cancel
                </button>

                <button
                    wire:click="delete"
                    class="px-4 py-2 bg-red-600 text-white rounded">
                    Obriši
                </button>
            </div>
        </div>
    </div>
    @endif

</div>