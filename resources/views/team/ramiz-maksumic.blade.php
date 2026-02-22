@extends('layouts.site')

@section('title', 'Ramiz Maksumić | Senior Web Developer | Reunion')
@section('meta_description', 'Saznajte više o Ramizu Maksumiću, našem iskusnom senior web developeru koji je ključni član našeg tima. Otkrijte njegovu stručnost, projekte i doprinos razvoju inovativnih web rješenja.')
@section('meta_keywords', 'Ramiz Maksumić, senior web developer, Reunion, web development, projekti, stručnost')

@section('og_title', 'Ramiz Maksumić | Senior Web Developer | Reunion')
@section('og_description', 'Saznajte više o Ramizu Maksumiću, našem iskusnom senior web developeru koji je ključni član našeg tima. Otkrijte njegovu stručnost, projekte i doprinos razvoju inovativnih web rješenja.')
@section('og_image', asset('images/team/Ramiz.jpg'))

@section('content')

<section class="bg-gray-50 py-16">
    <div class="max-w-screen-2xl px-5 md:px-16 mx-auto">

        <div class="bg-white shadow-xl rounded-2xl overflow-hidden grid grid-cols-1 md:grid-cols-3">

            {{-- LIJEVA KOLONA --}}
            <aside class="bg-gray-900 text-white p-8 md:col-span-1">

                {{-- SLIKA --}}
                <div class="flex flex-col items-center text-center">
                    <img src="/images/team/Ramiz.jpg"
                        class="w-40 h-40 object-cover object-top rounded-full border-4 border-white shadow-lg mb-4">

                    <h1 class="text-2xl font-bold font-body">Ramiz Maksumić</h1>
                    <p class="text-white mt-1 font-body">Founder & Lead Developer</p>
                </div>

                {{-- INFO --}}
                <div class="mt-8 space-y-3 text-sm">
                    <p><strong>Email:</strong> info@reunionagencija.com</p>
                    <p><strong>Telefon:</strong> +387 61 910 161</p>
                    <p><strong>Lokacija:</strong> Mostar</p>
                </div>

                {{-- SKILLS --}}
                <div class="mt-10">
                    <h3 class="uppercase text-sm text-gray-400 mb-3 font-body">Ključne vještine</h3>

                    <div class="flex flex-wrap gap-2 font-body">
                        <span class="bg-white/10 px-3 py-1 rounded-full text-sm">PHP</span>
                        <span class="bg-white/10 px-3 py-1 rounded-full text-sm">Laravel</span>
                        <span class="bg-white/10 px-3 py-1 rounded-full text-sm">Livewire</span>
                        <span class="bg-white/10 px-3 py-1 rounded-full text-sm">Tailwind CSS</span>
                        <span class="bg-white/10 px-3 py-1 rounded-full text-sm">Alpine JS</span>
                        <span class="bg-white/10 px-3 py-1 rounded-full text-sm">WordPress</span>
                        <span class="bg-white/10 px-3 py-1 rounded-full text-sm">SEO</span>
                        <span class="bg-white/10 px-3 py-1 rounded-full text-sm">UI/UX</span>

                    </div>
                </div>

                {{-- CTA --}}
                <a href="/kontakt"
                    class="block mt-10 bg-primary text-center py-3 rounded-xl font-semibold hover:opacity-90 transition">
                    Kontaktirajte me
                </a>

            </aside>

            {{-- DESNA KOLONA --}}
            <main class="p-10 md:col-span-2 space-y-10">

                {{-- O MENI --}}
                <div>
                    <h2 class="text-2xl font-bold mb-4">Biografija</h2>

                    <p class="text-gray-700 leading-relaxed mb-4">
                        Osnivač Reunion web & marketing agencije sa više od 10 godina iskustva
                        u razvoju web stranica, aplikacija i digitalnih strategija.
                    </p>

                    <p class="text-gray-700 leading-relaxed">
                        Fokusiran na izgradnju modernih digitalnih sistema koji donose
                        konkretne poslovne rezultate klijentima širom BiH i regiona.
                    </p>
                </div>

                {{-- ISKUSTVO --}}
                <div>
                    <h2 class="text-2xl font-bold mb-4">Iskustvo</h2>

                    <div class="space-y-6">

                        <div>
                            <h4 class="font-semibold">Reunion Web & Marketing</h4>
                            <p class="text-sm text-gray-500">2016 – danas</p>
                            <p class="text-gray-700 mt-2">
                                Razvoj web rješenja, marketing strategija i digitalnih platformi
                                za klijente iz turizma, proizvodnje, uslužnih djelatnosti.
                            </p>
                        </div>

                        <div>
                            <h4 class="font-semibold">Freelance & Web Development</h4>
                            <p class="text-sm text-gray-500">2012 – 2016</p>
                            <p class="text-gray-700 mt-2">
                                Rad na različitim web projektima, UI/UX dizajnu i SEO optimizaciji.
                            </p>
                        </div>

                    </div>
                </div>

                {{-- PROJEKTI --}}
                <div>
                    <h2 class="text-2xl font-bold mb-4">Istaknuti projekti</h2>

                    <ul class="space-y-2 text-gray-700">
                        <li><a href="https://hotel-swissplus.com/" class="font-bold" target="_blank">Hotel Swiss Plus</a> – web & SEO</li>
                        <li><a href="https://hercegovinalijek.ba/" class="font-bold" target="_blank">Hercegovinalijek</a> - web & SEO</li>
                        <li><a href="https://autoprevoz.ba/" class="font-bold" target="_blank">Autoprevoz</a> - web, SEO, Branding</li>
                        <li><a href="https://novaprica.ba/" class="font-bold" target="_blank">Nova Priča</a> – gastro brand web</li>
                        <li><a href="https://perfectfit.ba/" class="font-bold" target="_blank">Perfect Fit</a>– fitness brend web</li>
                    </ul>
                </div>

            </main>

        </div>

    </div>
</section>

@endsection