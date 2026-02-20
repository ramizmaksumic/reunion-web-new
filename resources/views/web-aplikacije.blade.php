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


<section class="py-24">
    <div class="max-w-5xl mx-auto px-6 text-center">

        <h2 class="font-heading text-3xl md:text-5xl mb-10">
            Custom web aplikacije za digitalizaciju poslovanja
        </h2>

        <p class="font-body text-lg leading-relaxed">
            Izrada web aplikacija podrazumijeva razvoj prilagođenih digitalnih sistema i platformi
            koji automatiziraju procese, upravljaju podacima i omogućavaju skalabilan rast poslovanja.
            Za razliku od klasičnih web stranica, web aplikacije uključuju kompleksnu logiku,
            korisničke naloge, administracijske panele, baze podataka i integracije s drugim sistemima.
        </p>

    </div>
</section>


<section class="bg-secondary py-24">
    <div class="max-w-screen-2xl mx-auto px-6">

        <h2 class="font-heading text-3xl text-center mb-16">
            Sistemi koje razvijamo
        </h2>

        <div class="grid md:grid-cols-3 gap-10">

            <div class="bg-white rounded-2xl p-8">
                <h3 class="font-heading text-xl mb-4">Booking sistemi</h3>
                <p class="font-body text-sm">
                    Online rezervacije, kalendari, naplate i upravljanje smještajem.
                </p>
            </div>

            <div class="bg-white rounded-2xl p-8">
                <h3 class="font-heading text-xl mb-4">Admin platforme</h3>
                <p class="font-body text-sm">
                    Upravljanje korisnicima, podacima i internim procesima.
                </p>
            </div>

            <div class="bg-white rounded-2xl p-8">
                <h3 class="font-heading text-xl mb-4">Custom CRM sistemi</h3>
                <p class="font-body text-sm">
                    Digitalni alati prilagođeni specifičnim poslovnim potrebama.
                </p>
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

                    <div class="">
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
                        <h2 class="font-heading text-2xl mb-4 text-center md:text-start">Koliko traje izrada web aplikacija?</h2>

                        <p class="font-body text-lg leading-relaxed text-center px-5 mt-5 md:text-start md:px-0">
                            Izrada web aplikcija prvenstveno zavisi od kompleksnosti projekta i obima funkcionalnosti.
                            Ako se radi o jednostavnijoj aplikaciji, proces može trajati od 4 do 6 sedmice. Srednje kompleksni sistemi obično zahtijevaju 8 do 12 sedmice, dok kompleksne platforme i digitalni sistemi mogu trajati 3 mjeseca ili duže.
                            Naše iskustvo nam omogućava da efikasno planiramo i realizujemo projekte, ali uvijek ostavljamo prostor za kvalitetnu izradu i testiranje kako bi finalni proizvod bio stabilan i spreman za upotrebu.


                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>

<!-- Cijena -->

<section class="bg-secondary py-24">
    <div class="max-w-4xl mx-auto text-center px-6">

        <h2 class="font-heading text-3xl mb-12">
            Koliko košta izrada web aplikacije?
        </h2>

        <div class="space-y-6 font-body text-lg">
            <p>Jednostavne aplikacije: od 3.000 KM</p>
            <p>Srednje kompleksni sistemi: 5.000 – 15.000 KM</p>
            <p>Kompleksne platforme: 20.000 KM+</p>
        </div>

    </div>
</section>

<section class="py-24">
    <div class="max-w-5xl mx-auto px-6 text-center">

        <h2 class="font-heading text-3xl mb-12">
            Kako izgleda proces razvoja?
        </h2>

        <div class="space-y-8 font-body">
            <p>1. Analiza i planiranje sistema</p>
            <p>2. Dizajn korisničkog iskustva</p>
            <p>3. Razvoj i testiranje</p>
            <p>4. Lansiranje i podrška</p>
        </div>

    </div>
</section>

<section class="py-24">
    <div class="max-w-4xl mx-auto px-6 text-center">

        <h2 class="font-heading text-3xl mb-8">
            Zašto investirati u custom web aplikaciju?
        </h2>

        <p class="font-body leading-relaxed">
            Custom web aplikacija omogućava potpunu kontrolu nad poslovnim procesima,
            veću sigurnost podataka i skalabilnost bez ograničenja gotovih rješenja.
        </p>

    </div>
    <div class="max-w-4xl mx-auto px-6 text-center mt-10">
        <h2 class="font-heading text-3xl mb-8">Nakon lansiranja</h2>

        <p class="font-body leading-relaxed">
            Po završetku razvoja, web prolazi završnu provjeru i pripremu za lansiranje.
            Po potrebi, nudimo podršku, održavanje i daljnje unapređenje u sklopu kontinuiranog marketing rješenja.


        </p>
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