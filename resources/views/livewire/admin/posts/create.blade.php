<div>
    <div class="max-w-4xl space-y-6">

        <h1 class="text-2xl font-bold">Novi post</h1>

        <input wire:model="title"
            class="w-full border p-3 rounded"
            placeholder="Naslov">

        <input wire:model="slug"
            class="w-full border p-3 rounded bg-gray-100"
            placeholder="Slug">

        <input type="hidden" wire:model="body" id="bodyInput">

        <div wire:ignore>
            <div id="editor" style="height:350px;background:white"></div>
        </div>

        <select wire:model="category_id"
            class="w-full border p-3 rounded">
            <option value="">Kategorija</option>
            @foreach($categories as $c)
            <option value="{{$c->id}}">{{$c->name}}</option>
            @endforeach
        </select>

        <select wire:model="tagIds"
            multiple
            class="w-full border p-3 rounded h-40">
            @foreach($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
        </select>

        <input type="file" wire:model="image">
        <input type="file" wire:model="banner">

        <button onclick="savePost()"
            class="bg-black text-white px-6 py-3 rounded">
            Sačuvaj post
        </button>

    </div>
</div>