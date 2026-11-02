@extends('layouts.site')

@section('title', 'Izrada web aplikacija | Custom sistemi i platforme')
@section('meta_description', 'Razvoj web aplikacija, booking sistema i poslovnih platformi po mjeri. Laravel i custom rješenja za ozbiljne firme.')
@section('meta_keywords', 'izrada web aplikacija Mostar')

@section('og_title', 'Izrada web aplikacija | Custom sistemi i platforme')
@section('og_description', 'vRazvoj web aplikacija, booking sistema i poslovnih platformi po mjeri. Laravel i custom rješenja za ozbiljne firme.')
@section('og_image', asset('images/og-mostar.jpg'))

@section('content')

<x-page-hero-section title="Izrada web aplikacija" description="Razvijamo web aplikacije koje su tehnički pouzdane, brze i spremne za dugoročni marketing, nadogradnje i rast biznisa" />


<!-- Osnovna sekcija -->
<section class="bg-secondary py-20">


    <div class="flex flex-col mx-auto px-5 md:px-16 max-w-screen-2xl justify-between pb-5 md:py-5 md:mt-5 gap-y-3">

        <div class="grid grid-cols-1 md:grid-cols-3">
            <div class="col-span-2">
                <h2 class="font-heading text-2xl md:text-4xl">Stvaramo jedan po jedan.</h2>
            </div>
            <div id="projects-number" class="col-span-1 flex gap-x-5 items-center">
                <div>
                    <p class="font-heading">Ukupno projekata</p>
                    <div class="w-full flex gap-x-1 mt-3">

                        @php
                        $projectsNumber = 25;
                        $maxBars = 13; // koliko ukupno slotova imaš u progress baru
                        @endphp

                        <div class="w-full flex gap-x-1 mt-3">
                            @for ($i = 1; $i <= $maxBars; $i++)
                                <div @class([ 'w-[10px] h-5 rounded-xl' , 'bg-primary'=> $i <= $projectsNumber, 'bg-default'=> $i > $projectsNumber,
                                    ])></div>
                        @endfor
                    </div>


                </div>
            </div>
            <div>
                <p class="font-heading text-7xl">{{ $projectsNumber }} +</p>
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
                    <img src="{{ URL::asset('images/services/laptop.png') }}"
                        alt="Laptop"
                        class="h-auto rounded-2xl md:max-w-[100%]">
                </div>

                <!-- Tagovi -->
                <div class="flex flex-wrap gap-3 mt-5 px-5">
                    <button class="bg-secondary py-3 px-5 rounded-xl text-xs cursor-pointer"># PHP</button>
                    <button class="bg-secondary py-3 px-5 rounded-xl text-xs cursor-pointer"># LARAVEL</button>
                    <button class="bg-secondary py-3 px-5 rounded-xl text-xs cursor-pointer"># LIVEWIRE</button>
                    <button class="bg-secondary py-3 px-5 rounded-xl text-xs cursor-pointer"># ALPINE</button>
                    <button class="bg-secondary py-3 px-5 rounded-xl text-xs cursor-pointer"># TAILWINDCSS</button>
                    <button class="bg-secondary py-3 px-5 rounded-xl text-xs cursor-pointer"># WORDPRESS</button>
                    <button class="bg-secondary py-3 px-5 rounded-xl text-xs cursor-pointer"># HTML & CSS</button>
                    <button class="bg-secondary py-3 px-5 rounded-xl text-xs cursor-pointer"># JAVASCRIPT</button>
                    <button class="bg-secondary py-3 px-5 rounded-xl text-xs cursor-pointer"># MYSQL</button>
                </div>


            </div>

            <!-- Desni dio (tekst) -->
            <div class="flex flex-col justify-start md:w-1/2">

                <div>
                    <h2 class="font-heading text-3xl font-bold mb-4 text-center px-5 md:px-0 md:text-start">Izrada web aplikacija | web development</h2>
                    <p class="font-body text-lg leading-relaxed text-center px-5 md:text-start md:px-0">
                        Izrada web aplikacija podrazumijeva razvoj prilagođenih digitalnih sistema i platformi koje automatiziraju procese, upravljaju podacima i
                        omogućavaju rast poslovanja. Za razliku od klasičnih web stranica, web aplikacije uključuju kompleksnu logiku, korisničke naloge,
                        administracijske panele i integracije s drugim sistemima.

                    </p>
                    <div class="mt-10">
                        <h2 class="font-heading text-2xl mb-4 text-center md:text-start">Kojoj firmi je potrebna web aplikacija?</h2>
                        <p class="font-body mt-3 px-5 md:px-0 text-center md:text-start">Web aplikacija je idealno rješenje za:</p>
                        <ul class="mt-5 font-body px-5 md:px-0 text-center md:text-start">
                            <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Hotele i smještajne objekte (booking sistemi)</li>
                            <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Kompanije koje upravljaju rezervacijama ili bazama podataka</li>
                            <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Startupe koji razvijaju digitalne platforme</li>
                            <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Firme koje žele digitalizovati interne procese </li>
                            <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Organizacije kojima je potrebna custom administracija i izvještaji </li>
                        </ul>

                    </div>
                    <div class="mt-10">
                        <h2 class="font-heading text-2xl mb-4 text-center md:text-start">Koje tehnologije koristimo?</h2>
                        <p class="font-body mt-3 px-5 md:px-0 text-center md:text-start">Razvoj web aplikacija radimo koristeći moderne tehnologije poput Laravel frameworka, prilagođenih baza podataka i skalabilnih serverskih rješenja.</p>

                    </div>
                    <div class="mt-10">
                        <h2 class="font-heading text-2xl mb-4 text-center md:text-start">Koliko košta izrada web aplikacije?</h2>
                        <p class="font-body mt-3 px-5 md:px-0 text-center md:text-start">Cijena zavisi od kompleksnosti sistema.</p>
                        <ul class="mt-5 font-body px-5 md:px-0 text-center md:text-start">
                            <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Jednostavne aplikacije: od 3.000 KM</li>
                            <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Srednje kompleksni sistemi: 5.000 – 10.000 KM</li>
                            <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Kompleksne platforme i digitalni sistemi: 10.000 KM +</li>

                        </ul>

                    </div>
                    <div class="mt-10">
                        <h2 class="font-heading text-2xl mb-4 text-center md:text-start">Šta je uključeno u fazu izrade web aplikacije?</h2>
                        <ul class="mt-5 font-body px-5 md:px-0 text-center md:text-start">
                            <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Front-end i back-end razvoj web aplikacije</li>
                            <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Responsivna prilagodba za sve uređaje</li>
                            <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Optimizacija brzine i performansi</li>
                            <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Sigurnosne postavke i osnovna zaštita </li>
                            <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>SEO-tehnička osnova </li>
                            <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Integracija kontakt formi i funkcionalnosti </li>
                            <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Priprema za daljnji marketing i sadržaj </li>
                        </ul>
                        <p class="font-body text-lg leading-relaxed text-center px-5 mt-5 md:text-start md:px-0">
                            Tokom razvoja redovno testiramo funkcionalnost, stabilnost i korisničko iskustvo kako bi web bio spreman za realnu upotrebu od prvog dana.

                        </p>
                    </div>
                    <div class="mt-10">
                        <h2 class="font-heading text-2xl mb-4 text-center md:text-start">Koliko traje izrada web aplikacija?</h2>

                        <p class="font-body text-lg leading-relaxed text-center px-5 mt-5 md:text-start md:px-0">
                            Izrada web aplikcija prvenstveno zavisi od kompleksnosti projekta i obima funkcionalnosti.
                            Ako se radi o jednostavnijoj aplikaciji, proces može trajati od 4 do 6 sedmice. Srednje kompleksni sistemi obično zahtijevaju 8 do 12 sedmice, dok kompleksne platforme i digitalni sistemi mogu trajati 3 mjeseca ili duže.
                            Naše iskustvo nam omogućava da efikasno planiramo i realizujemo projekte, ali uvijek ostavljamo prostor za kvalitetnu izradu i testiranje kako bi finalni proizvod bio stabilan i spreman za upotrebu.


                        </p>
                    </div>
                    <div class="mt-10">
                        <h2 class="font-heading text-2xl mb-4 text-center md:text-start">Nakon lansiranja</h2>

                        <p class="font-body text-lg leading-relaxed text-center px-5 mt-5 md:text-start md:px-0">
                            Po završetku razvoja, web prolazi završnu provjeru i pripremu za lansiranje.
                            Po potrebi, nudimo podršku, održavanje i daljnje unapređenje u sklopu kontinuiranog marketing rješenja.


                        </p>
                    </div>

                    <div class="mt-10">
                        <h2 class="font-body  text-2xl mb-4 text-center md:text-start">Da li trebate neku od naših ostalih usluga</h2>

                        <div class="flex flex-wrap gap-x-5 gap-y-3 justify-center md:justify-start mt-5 px-5 md:px-0">
                            <p><a href="/izrada-web-stranica" class="font-body hover:text-primary uppercase">Izrada web stranica</a></p>
                            <p><a href="/digitalni-marketing" class="font-body hover:text-primary uppercase">Digitalni marketing</a></p>
                            <p><a href="/google-ads" class="font-body hover:text-primary uppercase">Google & Meta ads</a></p>
                            <p><a href="/foto-video" class="font-body hover:text-primary uppercase">Foto & video</a></p>
                            <p><a href="/branding" class="font-body hover:text-primary uppercase">Branding & dizajn</a></p>
                            <p><a href="/pr-komunikacija" class="font-body hover:text-primary uppercase">PR & Eventi</a></p>
                            <p><a href="/team-building" class="font-body hover:text-primary uppercase">Team building</a></p>
                        </div>
                    </div>
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



<x-project-inquiry-cta />
















@endsection