@extends('layouts.site')

@section('content')

<x-page-hero-section title="Usluge" description="Detaljan opis usluga Reunion web & marketing agencije" />

<section class="bg-secondary py-16 md:py-20">
    <div class="flex flex-col mx-auto px-5 md:px-16 max-w-screen-2xl gap-y-4">

        <!-- WEB DESIGN -->
        <div
            class="flex flex-col md:flex-row md:items-center md:justify-between gap-4
                   rounded-2xl p-6 md:p-5
                   hover:shadow-2xl transition-shadow bg-secondary">

            <h2 class="text-2xl md:text-3xl font-heading text-center md:text-start">
                Web design
            </h2>

            <div class="hidden md:block border-b-2 border-black w-1/2 mx-6"></div>

            <a href="{{ route('web-design') }}"
                class="bg-primary font-heading text-default py-4 px-8 rounded-2xl
                      w-full md:w-56 text-center">
                Više detalja →
            </a>
        </div>
        <!-- WEB DEV -->
        <div
            class="flex flex-col md:flex-row md:items-center md:justify-between gap-4
                   rounded-2xl p-6 md:p-5
                   hover:shadow-2xl transition-shadow bg-secondary">

            <h2 class="text-2xl md:text-3xl font-heading text-center md:text-start">
                Web development
            </h2>

            <div class="hidden md:block border-b-2 border-black w-1/2 mx-6"></div>

            <a href="{{ route('web-dev') }}"
                class="bg-primary font-heading text-default py-4 px-8 rounded-2xl
                      w-full md:w-56 text-center">
                Više detalja →
            </a>
        </div>
        <!-- DIGITAL MARKETING -->
        <div
            class="flex flex-col md:flex-row md:items-center md:justify-between gap-4
                   rounded-2xl p-6 md:p-5
                   hover:shadow-2xl transition-shadow bg-secondary">

            <h2 class="text-2xl md:text-3xl font-heading text-center md:text-start">
                Digitalni marketing
            </h2>

            <div class="hidden md:block border-b-2 border-black w-1/2 mx-6"></div>

            <a href="{{ route('social-media') }}"
                class="bg-primary font-heading text-default py-4 px-8 rounded-2xl
                      w-full md:w-56 text-center">
                Više detalja →
            </a>
        </div>
        <!-- Google & Meta ads -->
        <div
            class="flex flex-col md:flex-row md:items-center md:justify-between gap-4
                   rounded-2xl p-6 md:p-5
                   hover:shadow-2xl transition-shadow bg-secondary">

            <h2 class="text-2xl md:text-3xl font-heading text-center md:text-start">
                Google & Meta ads
            </h2>

            <div class="hidden md:block border-b-2 border-black w-1/2 mx-6"></div>

            <a href="{{ route('google-ads') }}"
                class="bg-primary font-heading text-default py-4 px-8 rounded-2xl
                      w-full md:w-56 text-center">
                Više detalja →
            </a>
        </div>
        <!-- PR & Eventi -->
        <div
            class="flex flex-col md:flex-row md:items-center md:justify-between gap-4
                   rounded-2xl p-6 md:p-5
                   hover:shadow-2xl transition-shadow bg-secondary">

            <h2 class="text-2xl md:text-3xl font-heading text-center md:text-start">
                PR & Eventi
            </h2>

            <div class="hidden md:block border-b-2 border-black w-1/2 mx-6"></div>

            <a href="{{ route('pr-komunikacija') }}"
                class="bg-primary font-heading text-default py-4 px-8 rounded-2xl
                      w-full md:w-56 text-center">
                Više detalja →
            </a>
        </div>
        <!-- Brending & dizajn -->
        <div
            class="flex flex-col md:flex-row md:items-center md:justify-between gap-4
                   rounded-2xl p-6 md:p-5
                   hover:shadow-2xl transition-shadow bg-secondary">

            <h2 class="text-2xl md:text-3xl font-heading text-center md:text-start">
                Brending & Dizajn
            </h2>

            <div class="hidden md:block border-b-2 border-black w-1/2 mx-6"></div>

            <a href="{{ route('branding') }}"
                class="bg-primary font-heading text-default py-4 px-8 rounded-2xl
                      w-full md:w-56 text-center">
                Više detalja →
            </a>
        </div>
        <!-- Foto & Video -->
        <div
            class="flex flex-col md:flex-row md:items-center md:justify-between gap-4
                   rounded-2xl p-6 md:p-5
                   hover:shadow-2xl transition-shadow bg-secondary">

            <h2 class="text-2xl md:text-3xl font-heading text-center md:text-start">
                Foto & Video
            </h2>

            <div class="hidden md:block border-b-2 border-black w-1/2 mx-6"></div>

            <a href="{{ route('foto-video') }}"
                class="bg-primary font-heading text-default py-4 px-8 rounded-2xl
                      w-full md:w-56 text-center">
                Više detalja →
            </a>
        </div>






    </div>
</section>



<section class="py-20">
    <div class="flex flex-col mx-auto px-5 md:px-16 max-w-screen-2xl justify-between pb-5 md:py-5 md:mt-5">

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
            <div class="mt-5 md:mt-0 w-full md:w-2/3"><x-form /></div>

        </div>
    </div>
</section>
















@endsection