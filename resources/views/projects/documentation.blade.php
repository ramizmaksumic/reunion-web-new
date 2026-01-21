@extends('layouts.site')

@section('content')
<section class="bg-gray-900 text-gray-100 min-h-screen">
    <div class="max-w-7xl mx-auto grid grid-cols-12">

        {{-- FILE TREE --}}
        <aside class="col-span-4 border-r border-gray-700 p-4">
            <h2 class="font-mono text-sm uppercase text-gray-400 mb-4">
                {{ $project->name }} struktura
            </h2>

            <ul class="space-y-2">
                @foreach($nodes as $node)
                @include('projects.partials.node', ['node' => $node])
                @endforeach
            </ul>
        </aside>

        {{-- EDITOR PANEL --}}
        <main
            class="col-span-8 p-8"
            x-data="{ title: 'Odaberite fajl', description: 'Kliknite na fajl ili folder da vidite opis.' }"
            x-on:show-node.window="title = $event.detail.title; description = $event.detail.description;">

            <h1 class="font-mono text-xl mb-4" x-text="title"></h1>

            <div class="bg-gray-800 rounded-md p-6 font-mono text-sm text-gray-300">
                <p x-text="description"></p>
            </div>
        </main>



    </div>
</section>
@endsection