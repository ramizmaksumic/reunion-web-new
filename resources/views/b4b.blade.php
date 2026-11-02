@extends('layouts.site')

@section('title', 'B4B | Dodatne poslovne usluge Reunion agencije')
@section('meta_description', 'B4B (Business for Business) – dodatne usluge koje realiziramo u saradnji sa provjerenim partnerima za razvoj vašeg biznisa.')
@section('meta_keywords', 'b4b, poslovne usluge, reunion partneri')

@section('og_title', 'B4B | Reunion agencija')
@section('og_description', 'Dodatne usluge koje realiziramo u saradnji sa provjerenim partnerima.')

@section('content')

<x-page-hero-section title="B4B" description="Dodatne usluge koje realiziramo u saradnji sa provjerenim partnerima" />

<section class="bg-secondary py-16 md:py-20">
    <div class="flex flex-col mx-auto px-5 md:px-16 max-w-screen-2xl gap-y-4">

        <!-- Team Building -->
        <div
            class="flex flex-col md:flex-row md:items-center md:justify-between gap-4
                   rounded-2xl p-6 md:p-5
                   hover:shadow-2xl transition-shadow bg-secondary">

            <h2 class="text-2xl md:text-3xl font-heading text-center md:text-start">
                Team Building
            </h2>

            <div class="hidden md:block border-b-2 border-black w-1/2 mx-6"></div>

            <a href="{{ route('team-building') }}"
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



<x-project-inquiry-cta />
















@endsection