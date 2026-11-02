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

<x-project-inquiry-cta />


















@endsection