@extends('layouts.site')

@section('content')

<x-page-hero-section title="Cjenovnik" description="cjenovnik usluga Reunion web & marketing agencije" />

<section class="bg-secondary md:py-20">


    <div class="flex flex-col mx-auto px-16 max-w-screen-2xl justify-between pb-5 md:py-5 md:mt-5 gap-y-3">
        <section x-data="{ category: 'web' }" class="py-16 ">
            <!-- Filter tabovi -->
            <div class="flex flex-col md:flex-row space-x-6 justify-center mb-10">
                <!-- <button
                    @click="category = 'all'"
                    :class="category === 'all' ? 'bg-primary font-heading text-2xl text-white px-4 py-2 rounded-lg shadow' : 'font-heading text-2xl px-4 py-2'">
                    Svi radovi
                </button> -->
                <button
                    @click="category = 'web'"
                    :class="category === 'web' ? 'bg-primary font-heading text-2xl text-white px-4 py-2 rounded-lg shadow' : 'font-heading text-2xl px-4 py-2'">
                    Web design
                </button>
                <button
                    @click="category = 'dev'"
                    :class="category === 'dev' ? 'bg-primary font-heading text-2xl text-white px-4 py-2 rounded-lg shadow' : 'font-heading text-2xl px-4 py-2'">
                    Development
                </button>
                <button
                    @click="category = 'design'"
                    :class="category === 'design' ? 'bg-primary font-heading text-2xl text-white px-4 py-2 rounded-lg shadow' : 'font-heading text-2xl px-4 py-2'">
                    Grafički dizajn
                </button>
                <button
                    @click="category = 'social'"
                    :class="category === 'social' ? 'bg-primary font-heading text-2xl text-white px-4 py-2 rounded-lg shadow' : 'font-heading text-2xl px-4 py-2'">
                    Social media
                </button>
            </div>

            <!-- Grid projekata (dummy) -->
            <div class="grid grid-cols-1 px-8">
                <!-- Web design -->
                <div x-show="category === 'web'" x-transition.duration.300ms
                    class="">
                    <x-price-component service="Web stranica one page" price="600,00" />
                    <x-price-component service="Web stranica osnovna" price="800,00" />
                    <x-price-component service="Web stranica business" price="1000,00" />
                    <x-price-component service="Web stranica korporativna" price="1200,00" />
                </div>

                <!-- Development -->
                <div x-show="category === 'dev'" x-transition.duration.300ms
                    class="">
                    <x-price-component service="Web shop" price="1000" />
                    <x-price-component service="Hosting" price="1500,00" />
                    <x-price-component service="Custom web" price="1000" />
                </div>

                <!-- Grafički dizajn -->
                <div x-show="category === 'design'" x-transition.duration.300ms
                    class="">
                    <x-price-component service="Web shop" price="1000" />
                    <x-price-component service="Hosting" price="1500,00" />
                    <x-price-component service="Custom web" price="1000" />
                </div>

                <!-- Social media -->
                <div x-show="category === 'social'" x-transition.duration.300ms
                    class="">
                    <x-price-component service="Web shop" price="1000" />
                    <x-price-component service="Hosting" price="1500,00" />
                    <x-price-component service="Custom web" price="1000" />
                </div>

            </div>
        </section>



    </div>
</section>



<section class=" py-20">
    <div class="flex flex-col mx-auto px-16 max-w-screen-2xl justify-between pb-5 md:py-5 md:mt-5">

        <div class="flex flex-col md:flex-row gap-x-10">
            <div class="w-full md:w-1/3 text-center md:text-start">
                <h2 class="font-heading text-4xl">Naruči uslugu</h2>
                <p class="mt-5 text-xl font-body pe-3">Putem ove forme možete izvrišiti online narudžbu usluge koju trebate.</p>
                <!-- <ul class="mt-8 font-body text-xl leading-13">
                    <li class="hover:shadow-md pl-3 rounded-xl">&rarr; Web dizajn</li>
                    <li class="hover:shadow-md pl-3 rounded-xl">&rarr; Digitalni marketing</li>
                    <li class="hover:shadow-md pl-3 rounded-xl">&rarr; Google ads</li>
                    <li class="hover:shadow-md pl-3 rounded-xl">&rarr; Fotografija</li>
                    <li class="hover:shadow-md pl-3 rounded-xl">&rarr; Branding</li>
                </ul> -->
            </div>
            <div class="w-full md:w-2/3"><x-form /></div>

        </div>
    </div>
</section>
















@endsection