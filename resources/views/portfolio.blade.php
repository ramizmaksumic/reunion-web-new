@extends('layouts.site')

@section('title', 'Portfolio | Projekti koje je realizirala Reunion agencija')
@section('meta_description', 'Pogledajte portfolio Reunion agencije – web stranice, aplikacije, brendiranje i marketinške kampanje koje smo realizirali za naše klijente.')
@section('meta_keywords', 'portfolio, projekti, reunion agencija')

@section('og_title', 'Portfolio | Reunion agencija')
@section('og_description', 'Pogledajte projekte koje smo stvarali — jedan po jedan, s razlogom.')

@section('content')



<x-page-hero-section title="Portfolio" description="Pogledajte projekte koje smo stvarali — jedan po jedan, s razlogom." />

<section class="bg-secondary md:py-20">


    <div class="flex flex-col mx-auto px-5 md:px-16 max-w-screen-2xl justify-between pb-5 md:py-5 md:mt-5 gap-y-3">
        <livewire:portfolio />



    </div>
</section>

<section class=" py-20">
    <div class="flex flex-col mx-auto px-5 md:px-16max-w-screen-2xl justify-between pb-5 md:py-5 md:mt-5">

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