@extends('layouts.site')

@section('og_title', $post->title)
@section('og_description', \Illuminate\Support\Str::words(strip_tags($post->body), 25))
@section('og_image', $post->image ? asset('storage/'.$post->image) : asset('images/logo.png'))

@section('content')

<x-page-hero-section title="{{$post->title}}" description="Reunion novosti & zanimljivosti" />

<section class="bg-secondary md:py-20">

    <div class="grid grid-cols-1 md:grid-cols-3 justify-between mx-auto max-w-screen-2xl gap-x-5">

        <!-- Lijeva kolona 2/3 -->
        <div class="col-span-2">
            <div>
                <img src="{{ URL::asset('storage/' . $post->image) }}" alt="" class="rounded-xl px-3 md:px-0">
                <span class="flex flex-row justify-between px-3 mt-2">
                    <small class="px-3 md:px-0">Slika: Ilustracija</small>
                    <small class="px-3 md:px-0">Objavljeno {{ $post->created_at->format('d. m. Y.') }} godine</small>

                </span>
            </div>
            <!-- Djeljenje društvene mreže -->
            <div class="flex flex-row gap-x-5 mt-10 px-3 md:px-0">
                <div>
                    <a href="">
                        <i class="fa-brands fa-facebook text-gray-400 text-2xl"></i>
                    </a>
                </div>
                <div>
                    <a href=""> <i class="fa-brands fa-instagram text-gray-400 text-2xl"></i></a>
                </div>
                <div>
                    <a href=""><i class="fa-brands fa-x text-gray-400 text-2xl"></i></a>
                </div>
                <div>
                    <a href=""><i class="fa-solid fa-envelope text-gray-400 text-2xl"></i></a>
                </div>
                <div>
                    <a href=""><i class="fa-brands fa-viber text-gray-400 text-2xl"></i></a>
                </div>
            </div>
            <div class="prose max-w-none px-3 md:px-0 mt-10">
                {!! $post->body !!}
            </div>

            <!-- Tagovi -->

            <div class="flex flex-row flex-wrap gap-x-5 gap-y-2 mt-10 px-3 md:px-0">
                @foreach($post->tags as $tag)

                <button class="bg-gray-200 rounded-xl py-3 px-5"># {{ $tag->name }}</button>
                @endforeach




            </div>

        </div>

        <!-- Desna kolona 1/3 -->
        <div class="col-span-1 mt-5 md:mt-0 mb-5 px-5 md:px-0">

            <!-- Baner slika -->


            <div class="bg-default">
                <img src="{{ URL::asset('images/baner.jpg') }}" alt="">
            </div>

            <!-- Povezane vijesti kartice -->
            <div class="space-y-6 mt-8">

                @foreach ($allPosts as $singlePost)

                <a href="{{ route('single-post', $singlePost) }}"
                    class="flex gap-4 items-start group">

                    <img
                        src="{{ asset('storage/'.$singlePost->image) }}"
                        class="w-32 h-20 object-cover rounded-lg">

                    <div>
                        <h3 class="font-semibold text-gray-800 group-hover:text-primary transition">
                            {{ $singlePost->title }}
                        </h3>

                        <p class="text-sm text-gray-500 mt-1">
                            {{ \Illuminate\Support\Str::words(strip_tags($singlePost->body), 12) }}
                        </p>
                    </div>

                </a>

                @endforeach

            </div>


        </div>
    </div>
</section>

@endsection