<li x-data="{ open: false }">
    <div
        class="flex items-center gap-2 cursor-pointer hover:text-white"
        data-title="{{ $node->name }}"
        data-description="{{ $node->description ?? 'Nema opisa.' }}"
        x-on:click="
            open = !open;
            $dispatch('show-node', {
                title: $el.dataset.title,
                description: $el.dataset.description
            });
        ">
        <span class="font-mono text-sm">
            {{ $node->type === 'folder' ? '📁' : '📄' }}
        </span>

        <span class="font-mono text-sm">
            {{ $node->name }}
        </span>
    </div>

    @if($node->children->count())
    <ul x-show="open" x-cloak class="ml-4 mt-2 space-y-2">
        @foreach($node->children as $child)
        @include('projects.partials.node', ['node' => $child])
        @endforeach
    </ul>
    @endif
</li>