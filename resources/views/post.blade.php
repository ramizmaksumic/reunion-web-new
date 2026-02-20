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
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{$post->title}}" class="w-full h-70 object-cover ">
                    <div class="p-6">
                        <p class="text-sm text-gray-500">{{$post->created_at->format('M-d Y')}}</p>
                        <h2 class="text-2xl font-heading mt-2 mb-3">{{ $post->title }}</h2>
                        <p class="text-lg text-gray-700 mb-4">
                            {!! \Illuminate\Support\Str::limit(strip_tags($post->body), 120) !!}
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

            <div class="bg-gray-50 p-6 rounded-xl shadow-sm space-y-4">

                <h3 class="text-lg font-semibold text-gray-800">
                    Naše usluge
                </h3>

                <p class="text-sm text-gray-600 leading-relaxed">
                    Pomažemo brendovima da izgrade snažno digitalno prisustvo kroz
                    strategiju, dizajn i tehnologiju. Svaki projekat posmatramo kao
                    dugoročnu investiciju, a ne samo web stranicu.
                </p>

                <ul class="space-y-2 text-sm text-gray-700">

                    <li class="hover:text-primary transition">
                        <a href="/izrada-web-stranica"> Izrada web stranica</a>
                    </li>

                    <li class="hover:text-primary transition">
                        <a href="/izrada-web-aplikacija"> Izrada web aplikcija</a>
                    </li>

                    <li class="hover:text-primary transition">
                        <a href="/digitalni-marketing">Digitalni marketing</a>
                    </li>

                    <li class="hover:text-primary transition">
                        <a href="/google-meta-ads">Google & Meta ads</a>
                    </li>

                    <li class="hover:text-primary transition">
                        <a href="/pr-komunikacija">PR & Eventi</a>
                    </li>

                    <li class="hover:text-primary transition">
                        <a href="/brending">Brending & Dizajn</a>
                    </li>

                </ul>

                <a href="/kontakt"
                    class="inline-block mt-4 bg-primary text-white px-4 py-2 rounded-lg text-sm font-medium hover:opacity-90 transition">
                    Zatražite ponudu
                </a>

            </div>

            <div class="flex mt-10 gap-3 flex-wrap">
                @php
                $tags = \App\Models\Tag::all();
                @endphp

                @foreach ($tags as $tag )

                <button class="bg-secondary rounded-xl py-2 px-5 text-primary font-medium font-body cursor-pointer">{{$tag->name}}</button>
                @endforeach

            </div>


            <!-- Najnoviji postovi -->
            <div class="bg-secondary p-6 rounded-2xl">
                <h3 class="text-xl font-heading mb-3">Najnoviji postovi</h3>
                <ul class="space-y-3">

                    @foreach($posts as $post)
                    <li>
                        <a href="{{ route('single-post', $post) }}" class="block hover:text-primary">{{ $post->title }}</a>
                        <p class="text-sm text-gray-500">{{ $post->created_at->format('d. F Y') }}</p>
                    </li>
                    @endforeach

                </ul>
            </div>

        </div>

    </div>
</section>

@endsection