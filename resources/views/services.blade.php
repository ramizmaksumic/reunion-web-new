@extends('layouts.site')

@section('title', 'Usluge | Web dizajn, digitalni marketing, Google ads i branding')
@section('meta_description', 'Pregled usluga Reunion agencije: izrada web stranica i aplikacija, digitalni marketing, Google & Meta oglašavanje, PR, branding i team building.')
@section('meta_keywords', 'usluge marketing agencije, web dizajn usluge, digitalni marketing usluge')

@section('og_title', 'Usluge | Reunion agencija')
@section('og_description', 'Pojedinačne usluge ili kompletan marketing sistem — vi birate.')

@section('content')

<x-page-hero-section title="Usluge" description="Pojedinačne usluge ili kompletan marketing sistem — vi birate" />

<section class="bg-secondary py-16 md:py-20">
    <div class="flex flex-col mx-auto px-5 md:px-16 max-w-screen-2xl gap-y-4">

        <!-- WEB DESIGN -->
        <div
            class="flex flex-col md:flex-row md:items-center md:justify-between gap-4
                   rounded-2xl p-6 md:p-5
                   hover:shadow-2xl transition-shadow bg-secondary">

            <h2 class="text-2xl md:text-3xl font-heading text-center md:text-start">
                Izrada web stranica
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
                Izrada web aplikacija
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

    </div>
</section>



<x-project-inquiry-cta />
















@endsection