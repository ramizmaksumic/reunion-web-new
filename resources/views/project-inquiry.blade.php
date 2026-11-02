@extends('layouts.site')
@section('title', 'Zatražite ponudu za svoj projekt | Reunion')
@section('content')
<section class="bg-secondary py-16 px-5">
<div class="max-w-4xl mx-auto">
<h1 class="font-heading text-2xl md:text-4xl leading-relaxed">Zatražite ponudu za svoj projekt</h1>
<p class="font-body text-xl mt-6">Recite nam nešto više o svom projektu. Odgovorite na nekoliko kratkih pitanja kako bismo bolje razumjeli vaše potrebe i pripremili odgovarajuću ponudu.</p>
</div></section>
<section class="max-w-4xl mx-auto py-12 px-5 font-body"><livewire:project-inquiry /></section>
@endsection
