<div>
    <!-- Tabs -->
    <div class="flex gap-6 mb-10">
        <button
            wire:click="setCategory('all')"
            class="font-heading {{ $activeCategory === 'all' ? 'text-primary' : '' }}">
            Sve
        </button>

        @foreach($categories as $category)
        <button
            wire:click="setCategory('{{ $category->slug }}')"
            class="font-heading cursor-pointer {{ $activeCategory === $category->slug ? 'text-primary' : '' }}">
            {{ $category->name }}
        </button>
        @endforeach
    </div>

    <!-- Projects -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($projects as $project)
        <x-portfolio-card :project="$project" />
        @endforeach

    </div>
    <div class="mt-10">
        {{ $projects->links() }}
    </div>

</div>