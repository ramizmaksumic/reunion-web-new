@extends('layouts.site')

@section('content')

<x-page-hero-section title="Web design" description="Dizajniramo web stranice koje su dio marketing strategije, jasne za korisnike i optimizirane da donose upite, prodaju i povjerenje. " />


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
                        $projectsNumber = 50;
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
                    <img src="{{ URL::asset('images/services/web-design.png') }}"
                        alt="Laptop"
                        class="h-auto rounded-2xl md:max-w-[100%]">
                </div>

                <!-- Tagovi -->
                <div class="flex flex-wrap gap-3 mt-5 px-5">
                    <button class="bg-secondary py-3 px-5 rounded-xl text-xs cursor-pointer"># FIGMA</button>
                    <button class="bg-secondary py-3 px-5 rounded-xl text-xs cursor-pointer"># PHOTOSHOP</button>
                    <button class="bg-secondary py-3 px-5 rounded-xl text-xs cursor-pointer"># ILLUSTRATOR</button>
                    <button class="bg-secondary py-3 px-5 rounded-xl text-xs cursor-pointer"># INDESIGN</button>
                    <button class="bg-secondary py-3 px-5 rounded-xl text-xs cursor-pointer"># PREIMER PRO</button>
                    <button class="bg-secondary py-3 px-5 rounded-xl text-xs cursor-pointer"># WORDPRESS</button>

                </div>

            </div>

            <!-- Desni dio (tekst) -->
            <div class="flex flex-col justify-start md:w-1/2">
                <h2 class="font-heading text-3xl font-bold mb-4 text-center md:text-start">Web design</h2>
                <p class="font-body text-lg leading-relaxed text-center px-5 md:text-start md:px-0">
                    Web dizajn je faza u kojoj oblikujemo kako vaš web izgleda, komunicira i vodi korisnika.
                    U ovoj fazi definišemo strukturu, sadržaj, vizualni identitet i sve ključne elemente prije same izrade web stranice.

                </p>
                <p class="font-body text-lg leading-relaxed text-center px-5 mt-5 md:text-start md:px-0">
                    Svaki web dizajn započinjemo jasno definisanom strategijom — ciljevima projekta, ciljnom publikom i porukama koje web treba prenijeti.
                    Na osnovu toga kreiramo dizajn koji ima svrhu, logiku i jasan fokus na korisnika.

                </p>
                <p class="font-body text-lg leading-relaxed text-center px-5 mt-5 md:text-start md:px-0">
                    U dizajnu koristimo profesionalni Figma softver, koji omogućava izradu detaljnih vizualnih rješenja do najsitnijih detalja.
                    Svaka sekcija, boja, tipografija i CTA unaprijed su isplanirani i usklađeni sa strategijom.

                </p>

                <div class="mt-10">
                    <h2 class="font-heading text-2xl mb-4 text-center md:text-start">Šta je uključeno u web design fazu</h2>
                    <ul class="mt-5 font-body px-5 md:px-0 text-center md:text-start">
                        <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Definisanje strukture i sadržaja web stranice</li>
                        <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>UX/UI dizajn prilagođen korisnicima</li>
                        <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Priprema i odabir vizuala i slika</li>
                        <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Postavljanje CTA elemenata i korisničkih tokova </li>
                        <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Dizajn svih ključnih stranica i sekcija </li>
                        <li class="mt-3"><i class="fa-solid fa-check mr-2"></i>Dizajn svih ključnih stranica i sekcija </li>
                    </ul>
                    <p class="font-body text-lg leading-relaxed text-center px-5 mt-5 md:text-start md:px-0">
                        Klijent tokom ove faze ima potpun uvid u proces i dobija pristup Figma fajlovima, kao i jasan vizualni prikaz kako će web izgledati u konačnici.

                    </p>
                </div>
                <div class="mt-10">
                    <h2 class="font-heading text-2xl mb-4 text-center md:text-start">Koliko traje web design faza</h2>

                    <p class="font-body text-lg leading-relaxed text-center px-5 mt-5 md:text-start md:px-0">
                        Web design faza u prosjeku traje 7 do 21 dan, u zavisnosti od obima projekta i definisane strategije.
                        Cilj je da se sve ključne odluke donesu na vrijeme — prije početka realizacije.

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