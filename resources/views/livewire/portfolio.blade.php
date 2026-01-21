<div>
    <!-- Tabs -->
    <div class="flex flex-wrap gap-3 md:gap-6 mb-6 md:mb-10">
        <button
            wire:click="setCategory('all')"
            class="font-heading px-3 py-1 rounded-full border border-gray-300 text-sm md:text-base
    {{ $activeCategory === 'all' ? 'text-primary border-primary' : 'text-gray-600' }}">
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