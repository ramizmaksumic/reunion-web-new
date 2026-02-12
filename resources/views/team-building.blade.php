@extends('layouts.site')

@section('content')

<x-page-hero-section title="Team building" description="Retreat u prirodi za kompanije, zaposlenike i manje grupe." />


<!-- Osnovna sekcija -->
<section class="bg-secondary py-20">


    <div class="flex flex-col mx-auto px-5 md:px-16 max-w-screen-2xl justify-between pb-5 md:py-5 md:mt-5 gap-y-3">

        <div class="grid grid-cols-1 md:grid-cols-3">
            <div class="col-span-2">
                <h2 class="font-heading text-md md:text-4xl">Ne hvalimo se veličinom, ali...</h2>
            </div>
            <div id="projects-number" class="col-span-1 flex gap-x-5 items-center">
                <div>
                    <p class="font-heading">Ukupno projekata</p>
                    <div class="w-full flex gap-x-1 mt-3">

                        @php
                        $projectsNumber = 10;
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
                <div class="w-full flex flex-col gap-y-3 justify-center px-5 md:px-0">
                    <img src="{{ URL::asset('images/team-building.jpg') }}"
                        alt="Social-media"
                        class="h-[450px] rounded-2xl md:max-w-[100%] object-cover">
                    <img src="{{ URL::asset('images/team-building-2.jpg') }}"
                        alt="Social-media"
                        class="h-[450px] rounded-2xl md:max-w-[100%] object-cover">
                    <small class="px-5 md:px-0">Foto: Dženad Džinoooo</small>



                </div>

                <!-- Tagovi -->
                <div class="flex flex-wrap gap-3 mt-5 px-5 md:px-0">
                    <button class="bg-secondary py-3 px-5 rounded-xl text-xs cursor-pointer"># Premium catering</button>
                    <button class="bg-secondary py-3 px-5 rounded-xl text-xs cursor-pointer"># Wine Tasting & MasterClass</button>
                    <button class="bg-secondary py-3 px-5 rounded-xl text-xs cursor-pointer"># Cocktail Master & Bar Experience </button>
                    <button class="bg-secondary py-3 px-5 rounded-xl text-xs cursor-pointer"># Muzika & atmosfera (day → night)</button>
                    <button class="bg-secondary py-3 px-5 rounded-xl text-xs cursor-pointer"># YOUTUBE</button>
                </div>

                <div class="mt-5 px-5 md:px-0">
                    <p class="font-body">
                        <span class="font-bold ">Spremni za nezaboravan team building?</span> Kontaktirate nas za prilagođenu ponudu.
                        Dostupno u BiH i regiji: Hrvatska, Srbija i Crna Gora (mrezalab@gmail.com). Idealno za male i srednje timove, koji žele malo drugačji Team Building.
                    </p>
                </div>


            </div>

            <!-- Desni dio (tekst) -->
            <div class="flex flex-col justify-start md:w-1/2">

                <p class="font-body px-5 md:px-0 text-center md:text-start">
                    <span class="font-bold">Koncept.</span> All Inclusive Team Building je kompletno organizovan team building u prirodi ili nekog drugoj
                    lokaciji po Vašem izboru, za manje i srednje kompanije (10 - 50 osoba), posebno dizajniran da
                    spoji vrhunsku gastronomiju, kvalitetnu muziku, networking i opuštanje u prirodi — bez
                    organizacijskog opterećenja. Mi preuzimamo 100% organizacije, vi dobijate 100% iskustva.
                </p>
                <p class="mt-5 font-body px-5 md:px-0 text-center md:text-start font-bold">Zašto planina ili priroda? Lokacije uz rijeke ili jezera su top destinacije: </p>
                <ul class="mt-5 font-body px-5 md:px-0 text-center md:text-start">
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Izlazak iz kancelarijskog okruženja uz atraktivne aktivnosti kao što su hiking, ferrata,
                        planinarenje, biciklističke ture, obilazak srednjovjekovnih utvrda i kraljevskih gradova ,</li>
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Fokus na mentalni reset i neformalnu komunikaciju kroz druženje u manjim grupama,</li>
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Idealno za onbonding, brainstorming i jačanje timske kulture cjelodnevnog druženja,</li>
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Sve popularniji format za Team Building u prirodi kod IT i tech kompanija u regiji i EU </li>
                </ul>
                <p class="mt-5 font-body px-5 md:px-0 text-center md:text-start font-bold">Šta uključuje ALL INCLUSIVE Team Building paket?: </p>
                <p class="mt-5 font-body px-5 md:px-0 text-center md:text-start font-medium">1. Premium catering (priprema hrane na licu mjesta) </p>
                <ul class="mt-5 font-body px-5 md:px-0 text-center md:text-start">
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Sezonski i lokalno inspirisan meni koji sadrži domaće organske namirnice ,</li>
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Branje gljiva i šumskih plodova, škola kuhanja ili kulinarsko takmićenje u prirodi,</li>
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Opcije: Finger food / Street food koncept / BBQ / Veggie ili Gourmet comfort food ,</li>
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Vegetarijanske, veganske i specijalne dijetalne opcije uz konsultacije nutricioniste, </li>
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Profesionalna postavka, servis i logistika (mogućnost izbora načina posluživanja) </li>
                </ul>
                <p class="mt-5 font-body px-5 md:px-0 text-center md:text-start font-medium">2. Wine Tasting & MasterClass </p>
                <ul class="mt-5 font-body px-5 md:px-0 text-center md:text-start">
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Kroz mini radionice i degustacije predstavit ćemo Vam ponudu domaćih vina,</li>
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Tokom predstavljanje svake etikete proći ćemo sve detalje od njenog nastanka,</li>
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Kroz degustacije u prirodi, vođene od strane certificiranog sommeliera naučite
                        razlikovati etikete, vrste vina i specifične najzastupljenije sorte u BiH i regiji </li>
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Nudimo mogućnost posluživanja fine dining slijedova hrane i vina uz edukacije </li>

                </ul>
                <p class="mt-5 font-body px-5 md:px-0 text-center md:text-start font-medium">3. Cocktail Master & Bar Experience </p>
                <ul class="mt-5 font-body px-5 md:px-0 text-center md:text-start">
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Profesionalni cocktail majstori + bar osoblje,</li>
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Signature cocktaili kreirani za kompaniju ili događaj ,</li>
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Bezalkoholni cocktaili (mocktails) </li>
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Live Cocktail Show & Mini edukacija (opcionalno) </li>
                </ul>
                <p class="mt-5 font-body px-5 md:px-0 text-center md:text-start font-medium">4. Muzika & atmosfera (day → night) </p>
                <ul class="mt-5 font-body px-5 md:px-0 text-center md:text-start">
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>DJ set prilagođen dnevnom i večernjem dijelu programa ,</li>
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Live saxophonist + perkusije za Premium Lounge & Sunset vibe ,</li>
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Postepeni prelaz iz Chill Daytime u večernju House energiju </li>
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Profesionalna audio oprema prilagođena ambijentu u prirodi </li>
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Mogućnost organizacije muzičkog kviza ili karaoke takmičenja </li>
                </ul>
                <p class="mt-5 font-body px-5 md:px-0 text-center md:text-start font-bold">Kome je namijenjen TB? </p>
                <ul class="mt-5 font-body px-5 md:px-0 text-center md:text-start">
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>IT & software development kompanije</li>
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Startupi i scale-up/sale-up timovi</li>
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Startupi i scale-up/sale-up timovi </li>
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Kompanije sa 10 - 50 zaposlenih </li>
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Kompanije sa 10 - 50 zaposlenih </li>
                </ul>
                <p class="mt-5 font-body px-5 md:px-0 text-center md:text-start font-bold">Ključne prednosti za kompaniju </p>
                <ul class="mt-5 font-body px-5 md:px-0 text-center md:text-start">
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Jedan partner – kompletna organizacija (all in one koncept) </li>
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Bez stresa i gubitka vremena na organizaciju</li>
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Premium doživljaj uz kontrolisan budžet </li>
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Jačanje timske kulture i interne komunikacije </li>
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i> Employer branding (content-friendly event) </li>
                </ul>
                <p class="mt-5 font-body px-5 md:px-0 text-center md:text-start font-bold">Dodatne opcije (upsel) </p>
                <ul class="mt-5 font-body px-5 md:px-0 text-center md:text-start">
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Brendiranje eventa (bar, čaše, meni, backdrop) </li>
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Angažman motivacijskih govornika i psihologa </li>
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Profesionalni photo & video aftermovie za sve </li>
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Team Building igre i facilitator </li>
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i> Overnight planinski retreat (2 dana) </li>
                </ul>
                <p class="mt-5 font-body px-5 md:px-0 text-center md:text-start font-bold">Zašto mi? </p>
                <ul class="mt-5 font-body px-5 md:px-0 text-center md:text-start">
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Iskustvo u cateringu, mixologiji i event produkciji </li>
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Certificirani edukatori, planinski vodići i sommelieri </li>
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Razumijevanje potreba IT & Tech sektora u BiH i regiji </li>
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Fokus na detalje, atmosferu i vrhunski kvalitet hrane i pića </li>
                    <li class="mt-3"><i class="fa-solid fa-check mr-2"></i> Fleksibilnost i personalizacija za svaku kompaniju ili pojedinca </li>
                </ul>
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