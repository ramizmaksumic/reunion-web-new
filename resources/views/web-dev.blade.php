@extends('layouts.site')

@section('content')

<x-page-hero-section title="Web development" description="Razvijamo web stranice koje su tehnički pouzdane, brze i spremne za dugoročni marketing, nadogradnje i rast biznisa" />


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
                    <h2 class="font-heading text-3xl font-bold mb-4 text-center px-5 md:px-0 md:text-start">Web development</h2>
                    <p class="font-body text-lg leading-relaxed text-center px-5 md:text-start md:px-0">
                        Web development je faza u kojoj odobreni dizajn pretvaramo u brzu, stabilnu i funkcionalnu web stranicu.
                        U ovoj fazi fokus je na tehničkoj izvedbi, performansama i dugoročnoj održivosti weba.

                    </p>
                    <p class="font-body text-lg leading-relaxed text-center px-5 mt-5 md:text-start md:px-0">
                        Svaki web razvijamo s ciljem da bude pouzdan, siguran i spreman za rast. Kod i struktura su prilagođeni budućim nadogradnjama, marketing kampanjama i sadržajnim promjenama.

                    </p>
                    <div class="mt-10">
                        <h2 class="font-heading text-2xl mb-4 text-center md:text-start">Šta je uključeno u web development fazu</h2>
                        <ul class="mt-5 font-body px-5 md:px-0 text-center md:text-start">
                            <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Front-end i back-end razvoj web stranice</li>
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
                        <h2 class="font-heading text-2xl mb-4 text-center md:text-start">Koliko traje web development faza?</h2>

                        <p class="font-body text-lg leading-relaxed text-center px-5 mt-5 md:text-start md:px-0">
                            Web development faza u prosjeku traje 14 do 30 dana, u zavisnosti od kompleksnosti projekta i obima funkcionalnosti.
                            Cilj ove faze je da web bude tehnički stabilan i spreman za korištenje, bez naknadnih improvizacija.


                        </p>
                    </div>
                    <div class="mt-10">
                        <h2 class="font-heading text-2xl mb-4 text-center md:text-start">Nakon lansiranja</h2>

                        <p class="font-body text-lg leading-relaxed text-center px-5 mt-5 md:text-start md:px-0">
                            Po završetku razvoja, web prolazi završnu provjeru i pripremu za lansiranje.
                            Po potrebi, nudimo podršku, održavanje i daljnje unapređenje u sklopu kontinuiranog marketing rješenja.


                        </p>
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