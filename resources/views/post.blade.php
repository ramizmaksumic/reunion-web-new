@extends('layouts.site')

@section('content')

<x-page-hero-section title="Novosti" description="informacije & zanimljivosti" />

<section class="py-12">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mx-auto max-w-screen-2xl px-4">

        <!-- Lijeva sekcija (2/3) - Postovi -->
        <div class="col-span-2 space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <!-- Post kartica -->

                @foreach ($posts as $post )

                <div class="bg-secondary rounded-2xl overflow-hidden shadow">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{$post->title}}" class="w-full h-[250px] object-cover ">
                    <div class="p-6">
                        <p class="text-sm text-gray-500">{{$post->created_at->format('M-d Y')}}</p>
                        <h2 class="text-2xl font-heading mt-2 mb-3">{{ $post->title }}</h2>
                        <p class="text-lg text-gray-700 mb-4">
                            {{$post->post}}
                        </p>
                        <a href="{{ route('single-post', $post) }}"
                            class="inline-block bg-primary text-default px-6 py-2 rounded-xl font-heading hover:opacity-90">
                            Pročitaj više →
                        </a>
                    </div>
                </div>
                @endforeach






            </div>


            <!-- Paginacija -->
            <div class="flex justify-center mt-8">
                <nav class="flex items-center space-x-2">
                    <a href="#"
                        class="px-4 py-2 bg-secondary rounded-xl hover:bg-primary hover:text-default">« Prethodna</a>
                    <a href="#"
                        class="px-4 py-2 bg-primary text-default rounded-xl">1</a>
                    <a href="#"
                        class="px-4 py-2 bg-secondary rounded-xl hover:bg-primary hover:text-default">2</a>
                    <a href="#"
                        class="px-4 py-2 bg-secondary rounded-xl hover:bg-primary hover:text-default">3</a>
                    <a href="#"
                        class="px-4 py-2 bg-secondary rounded-xl hover:bg-primary hover:text-default">Sljedeća »</a>
                </nav>
            </div>
            <!-- Ako kasnije koristiš Laravel pagination -->
            {{-- {{ $posts->links() }} --}}

        </div>

        <!-- Desna sekcija (1/3) - Sidebar -->
        <div class="col-span-1 space-y-8">

            <!-- Search box -->
            <div class="bg-secondary p-6 rounded-2xl">
                <h3 class="text-xl font-heading mb-3">Pretraga</h3>
                <input type="text" placeholder="Traži..."
                    class="w-full bg-white rounded-xl px-4 py-2 outline-none border border-gray-300">
            </div>

            <!-- Kategorije -->
            <div class="bg-primary p-6 rounded-2xl text-default">
                <h3 class="text-xl font-heading mb-3">Zanimljivosti</h3>
                <img src="{{ URL::asset('images/gaj.png') }}" alt="" class="rounded-2xl mb-4">
                <p class="font-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores voluptatibus numquam omnis a dolorum. Delectus tenetur,
                    fugit ea cum eveniet saepe assumenda molestias ipsa voluptas dolorum exercitationem voluptate
                    labore enim, quas odit velit quod facilis neque quis quam earum id officia rem! Tenetur tempora id
                    corrupti porro accusamus nemo nisi.</p>

                <div class="flex mt-10 gap-3 flex-wrap">
                    @php
                    $tags = \App\Models\Tag::all();
                    @endphp

                    @foreach ($tags as $tag )

                    <button class="bg-default rounded-xl py-2 px-5 text-primary font-medium font-body cursor-pointer">{{$tag->name}}</button>
                    @endforeach

                </div>
            </div>

            <!-- Najnoviji postovi -->
            <div class="bg-secondary p-6 rounded-2xl">
                <h3 class="text-xl font-heading mb-3">Najnoviji postovi</h3>
                <ul class="space-y-3">
                    <li>
                        <a href="#" class="block hover:text-primary">Kako kreirati moderan web sajt</a>
                        <p class="text-sm text-gray-500">8. avgust 2025</p>
                    </li>
                    <li>
                        <a href="#" class="block hover:text-primary">Savjeti za uspješan digitalni marketing</a>
                        <p class="text-sm text-gray-500">5. avgust 2025</p>
                    </li>
                </ul>
            </div>

        </div>

    </div>
</section>

@endsection