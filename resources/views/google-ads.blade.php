@extends('layouts.site')

@section('content')

<x-page-hero-section title="Google & Meta ads" description="Planiramo, postavljamo i vodimo Google i Meta (Facebook & Instagram) oglase koji su dio šire marketing strategije i fokusirani na upite, prodaju i mjerljive rezultate." />


<!-- Osnovna sekcija -->
<section class="bg-secondary py-20">


    <div class="flex flex-col mx-auto px-5 md:px-16 max-w-screen-2xl justify-between pb-5 md:py-5 md:mt-5 gap-y-3">

        <div class="grid grid-cols-1 md:grid-cols-3">
            <div class="col-span-2">
                <h2 class="font-heading text-4xl">Stvaramo jedan po jedan.</h2>
            </div>
            <div id="projects-number" class="col-span-1 flex gap-x-5 items-center">
                <div>
                    <p class="font-heading">Ukupno projekata</p>
                    <div class="w-full flex gap-x-1 mt-3">

                        @php
                        $projectsNumber = 200;
                        $maxBars = 13; // koliko ukupno slotova imaš u progress baru
                        @endphp

                        <div class="w-full flex gap-x-1 mt-3">
                            @for ($i = 1; $i <= $maxBars; $i++)
                                <div
                                @class([ 'w-[10px] h-5 rounded-xl' , 'bg-primary'=> $i <= $projectsNumber, 'bg-default'=> $i > $projectsNumber,
                                    ])>
                        </div>
                        @endfor
                    </div>

                </div>
            </div>
            <div>
                <p class="font-heading text-7xl">{{ $projectsNumber }}</p>
            </div>
        </div>

    </div>


    </div>
</section>

<!-- Sekcija sa detaljima web web -->
<section>
    <!-- Glavni div -->
    <div class="max-w-screen-2xl mx-auto">

        <div class="flex flex-col md:flex-row justify-between gap-7 mt-20">
            <!-- Lijevi dio (slika + tagovi) -->
            <div class="flex flex-col md:w-1/2">
                <!-- Slika -->
                <div class="w-full flex justify-start">
                    <img src="{{ URL::asset('images/services/google-ads.png') }}"
                        alt="Laptop"
                        class="h-auto rounded-2xl md:max-w-[100%]">
                </div>

                <!-- Tagovi -->
                <div class="flex flex-wrap gap-3 mt-5 px-5">
                    <button class="bg-secondary py-3 px-5 rounded-xl text-xs cursor-pointer"># GOOGLE ADS</button>
                    <button class="bg-secondary py-3 px-5 rounded-xl text-xs cursor-pointer"># CPC</button>
                    <button class="bg-secondary py-3 px-5 rounded-xl text-xs cursor-pointer"># GMB PROFILE</button>
                    <button class="bg-secondary py-3 px-5 rounded-xl text-xs cursor-pointer"># SEO</button>
                    <button class="bg-secondary py-3 px-5 rounded-xl text-xs cursor-pointer"># SEM</button>
                </div>


            </div>

            <!-- Desni dio (tekst) -->
            <div class="flex flex-col justify-start md:w-1/2">
                <h2 class="font-heading text-3xl font-bold mb-4 text-center md:text-start">Google & Meta ads</h2>

                <div>
                    <p class="font-body px-5 md:px-0 text-center md:text-start">
                        Za potrebe naših klijenata kreiramo digitalne kampanje i plaćeno oglašavanje koje je dio šire marketing strategije.
                        Dugogodišnje iskustvo i znanje omogućavaju nam da budžete za oglašavanje maksimalno optimiziramo, uz jasan fokus na rezultate.
                    </p>
                    <p class="font-body px-5 mt-5 md:px-0 text-center md:text-start">
                        Pravilno planiranje i upravljanje kampanjama osiguravaju da oglasi donose vrijednost ne samo dok su aktivni, već i nakon što kampanje završe. Ako imate budžet za oglašavanje,
                        preporučujemo da taj zadatak povjerite profesionalcima — jer za istu investiciju možemo postići znatno više od pukog “boostanja” objava.
                    </p>
                    <p class="font-body mt-5 px-5 md:px-0 text-center md:text-start">Reunion tim i naši stalni saradnici do sada su radili na 200+ kampanja među njima ističemo: </p>
                </div>
                <div class="mt-10">
                    <h2 class="font-heading text-2xl mb-4 text-center md:text-start">U okviru ove usluge nudimo:</h2>
                    <ul class="mt-5 font-body px-5 md:px-0 text-center md:text-start">
                        <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Facebook i Instagram Ads</li>
                        <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Google Ads</li>
                        <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>LinkedIn Ads</li>
                        <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Optimizaciju kampanja i budžeta </li>
                        <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Dizajn svih ključnih stranica i sekcija </li>
                        <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Remarketing i praćenje konverzija </li>
                    </ul>
                    <p class="font-body text-lg leading-relaxed text-center px-5 mt-5 md:text-start md:px-0">
                        Reunion tim i naši stalni saradnici imaju dugogodišnje iskustvo u vođenju digitalnih kampanja, a do sada su realizovali 200+ kampanja za klijente iz različitih industrija.

                    </p>
                </div>

            </div>
        </div>
    </div>

</section>

<section class="bg-secondary py-20 mt-10">
    <div class="flex flex-col md:flex-row max-w-screen-2xl mx-auto justify-center text-center">
        <div class="flex flex-col justify-center">
            <img src="{{ URL::asset('images/certifikat.png') }}" alt="Reunion web standard" class="w-50 mb-15 self-center">
            <h3 class="font-heading text-3xl mb-5">Reunion web strandard</h3>
            <p class="font-body px-5">Reunion web standard je skup pravila po kojima radimo i koja su sastavni dokument
                prilikom potpisivanja svakog novog ugovora i poslovne saradnje. Time se obavezujemo da će usluga biti urađena po
                najvišim poslovnim standardima.
            </p>
            <p class="font-body px-5 mt-5"><span class="font-bold">Reunion web standard ujedno služi i kao garancija za usluge Reunion web & marketing agencije</span>.
            </p>
        </div>


</section>



<section class=" py-20">
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
            <div class="w-full md:w-2/3"><x-form /></div>

        </div>
    </div>
</section>


@endsection