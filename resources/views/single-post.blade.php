@extends('layouts.site')

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
            <div class="flex flex-wrap gap-3 mt-5 px-5 md:px-0">
                <p>{{$post->body}}</p>


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
            <div class="py-10 px-5 mt-5">
                <h4 class="font-body text-2xl font-medium">Možda vas zanima</h4>
                <div class="flex flex-row gap-x-3 mt-5">
                    @foreach ($allPosts as $singlePost )

                    <div class="card">
                        <img src="{{ URL::asset('images/post.jpg') }}" alt="" class="w-[130px]">
                        <small class="font-body uppercase text-primary font-medium">{{ $singlePost->title }}</small>
                        <h4 class="font-body text-medium">{{$singlePost->post}}</h4>

                    </div>
                    @endforeach


                </div>
            </div>


        </div>
    </div>
</section>

@endsection