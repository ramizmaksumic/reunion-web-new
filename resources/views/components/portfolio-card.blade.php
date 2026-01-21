@props(['project'])

<div class="bg-white rounded-xl shadow hover:shadow-lg p-5 transition">
    <img
        src="{{ asset(path: "storage/" . $project->image) }}"
        alt="{{ $project->name }}"
        class="rounded-lg mb-4 w-full object-cover h-54">

    <h3 class="text-xl font-heading mb-2">
        {{ $project->name }}
    </h3>

    <p class="text-gray-600 text-md">
        {{ $project->excerpt ?? Str::limit($project->description, 100) }}
    </p>

    @if(!empty($project->slug))
    <a href="{{ route('single-portfolio', $project->slug) }}" class="inline-block mt-4 text-primary font-heading">
        Pogledaj projekt →
    </a>
    @endif
</div>