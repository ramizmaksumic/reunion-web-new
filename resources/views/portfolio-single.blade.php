@extends('layouts.site')

@section('content')

<x-page-hero-section :title="$project->name" description="ponosno predstavljamo" />

<section class="bg-secondary md:py-20">

    <div class="grid grid-cols-1 md:grid-cols-3 justify-between mx-auto max-w-screen-2xl gap-x-5">

        <!-- Lijeva kolona 2/3 -->
        <div class="col-span-2">
            <div>
                <img src="{{ URL::asset('storage/' . $project->image) }}" alt="" class="rounded-xl px-3 md:px-0">
            </div>
            <div class="flex flex-wrap gap-3 mt-5 px-5">
                @foreach ($project->tags as $tag )

                <button class="bg-default py-3 px-5 rounded-xl text-xs cursor-pointer"># {{ $tag->name }}</button>
                @endforeach

            </div>
            <div class="flex flex-wrap gap-3 pl-0">
                <x-gallery
                    :images="$project->images
        ->pluck('path')
        ->map(fn ($path) => asset('storage/' . $path))
        ->toArray()" />

            </div>

        </div>

        <!-- Desna kolona 1/3 -->
        <div class="col-span-1 mt-5 md:mt-0 mb-5 px-5 md:px-0">

            <!-- Naziv kategorije -->
            <div class="bg-primary rounded-2xl py-3 px-5">
                <h3 class="font-heading text-3xl text-default uppercase">{{$project->category->name}}</h3>
                <p class="font-body text-default mt-5">Klijent: {{$project->name}}</p>
            </div>

            <div class="bg-default rounded-2xl py-3 px-5 mt-5">
                <p class="font-body mt-5">
                    {{$project->description}}
                </p>
            </div>
            <div class="bg-default rounded-2xl py-3 px-5 mt-5">
                <h4 class="font-heading font-bold mt-5">
                    <span class="flex flex-row">



                        @if ($project->status == 'aktivan')
                        Aktivan:
                        <div class="flex ml-5 gap-x-2 mr-5">
                            <div class="bg-primary w-[10px] h-[20px] rounded-xl" 10px=""></div>
                            <div class="bg-primary w-[10px] h-[20px] rounded-xl" 10px=""></div>
                            <div class="bg-primary w-[10px] h-[20px] rounded-xl" 10px=""></div>
                            <div class="bg-primary w-[10px] h-[20px] rounded-xl" 10px=""></div>
                            <div class="bg-primary w-[10px] h-[20px] rounded-xl" 10px=""></div>
                            <div class="bg-primary w-[10px] h-[20px] rounded-xl" 10px=""></div>
                            <div class="bg-primary w-[10px] h-[20px] rounded-xl" 10px=""></div>
                            <div class="bg-primary w-[10px] h-[20px] rounded-xl" 10px=""></div>
                        </div>

                        @else
                        Održavanje:
                        <div class="flex ml-5 gap-x-2 mr-5">
                            <div class="bg-gray-500 w-[10px] h-[20px] rounded-xl" 10px=""></div>
                            <div class="bg-gray-500 w-[10px] h-[20px] rounded-xl" 10px=""></div>
                            <div class="bg-gray-500 w-[10px] h-[20px] rounded-xl" 10px=""></div>
                            <div class="bg-gray-500 w-[10px] h-[20px] rounded-xl" 10px=""></div>
                            <div class="bg-gray-500 w-[10px] h-[20px] rounded-xl" 10px=""></div>
                            <div class="bg-gray-500 w-[10px] h-[20px] rounded-xl" 10px=""></div>
                            <div class="bg-gray-500 w-[10px] h-[20px] rounded-xl" 10px=""></div>
                            <div class="bg-gray-500 w-[10px] h-[20px] rounded-xl" 10px=""></div>
                        </div>

                        @endif

                    </span>
                </h4>
            </div>
            <div class="bg-default rounded-2xl py-3 px-5 mt-5">
                <a href="{{ $project->link }}" target="_blank" class="font-sm"><span class="font-bold">Link:</span> <span class="hover:text-blue-700">{{$project->name}}</span></a>
            </div>
        </div>
    </div>
</section>

@endsection