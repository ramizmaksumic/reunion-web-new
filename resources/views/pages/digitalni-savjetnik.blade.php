@extends('layouts.site')

@section('title', 'Digitalni savjetnik | Besplatna konsultacija za web i marketing')
@section('meta_description', 'Zatražite besplatan savjet od Reunion tima o web razvoju, digitalnom marketingu ili oglašavanju, prilagođen vašem biznisu.')
@section('meta_keywords', 'digitalni savjetnik, besplatna konsultacija marketing')

@section('og_title', 'Digitalni savjetnik | Reunion agencija')
@section('og_description', 'Zatražite besplatan savjet od Reunion tima o web razvoju i digitalnom marketingu.')

@section('content')
<section class="bg-secondary py-16">
    <div class="mx-auto max-w-4xl px-4">
        <h1 class="font-heading text-3xl md:text-4xl font-bold text-slate-800 mb-4">
            Digitalni savjetnik za web i marketing
        </h1>

        <p class="text-slate-800 mb-10 max-w-2xl">
            Kratak, konkretan savjet prilagođen Vašem biznisu, budžetu i tržištu Bosne i Hercegovine.
        </p>

        <livewire:digitalni-savjetnik />
    </div>
</section>
@endsection