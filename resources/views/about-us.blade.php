@extends('layouts.site')

@section('content')

<x-page-hero-section title="O nama" description="Detaljan opis Reunion web & marketing agencije" />

<section class=" bg-secondary">

    <div class="flex flex-col mx-auto px-5 md:px-16 max-w-screen-2xl justify-center items-center py-10 md:py-20">
        <p class="text-center">
            Reunion – marketing i web agencija je tim koji pomaže brendovima da izgrade snažno online prisustvo kroz moderan web dizajn, kvalitetan razvoj web stranica i strateški digitalni marketing. Naš fokus je na rješenjima koja donose konkretne rezultate – više upita, bolju prezentaciju i jasniju komunikaciju s klijentima. Kroz dugogodišnje iskustvo i rad s različitim industrijama, posebno u turizmu, pristupamo svakom projektu sistematično, profesionalno i s punom pažnjom na detalje, kako bismo isporučili web koji izgleda vrhunski i radi još bolje.
        </p>
        <a href="/kontakt" class="font-heading text-xl md:text-3xl py-5 px-10 rounded-2xl bg-primary text-default mt-8">Besplatne konsultacije &rarr;</a>
    </div>





</section>
<section class="py-5">

    <div class="flex flex-col mx-auto px-5 md:px-16 max-w-screen-2xl justify-between py-10 md:py-10">
        <h2 class="font-heading text-5xl text-center">Zašto baš mi?</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 gap-x-5 mt-16">
            <div class="mt-5"><x-about-card title="10 + godina s nama" text="Više od 10 godina gradimo digitalna rješenja koja pomažu firmama da rastu i budu prepoznatljive na tržištu. Kroz iskustvo na desetinama projekata naučili smo šta zaista donosi rezultate, a šta je samo trend. Upravo zato nudimo provjeren pristup, realne rokove i podršku na koju se možete osloniti – prije, tokom i nakon izrade web stranice." icon="fa regular fa-calendar-days" /></div>
            <div class="mt-5"><x-about-card title="Rezultati, ne predpostavke" text="Kod nas odluke ne nastaju “po osjećaju”, nego na osnovu onoga što donosi stvarne rezultate. Svaki web i svaka kampanja imaju jasan cilj – više upita, bolju prodaju ili jaču vidljivost – a naš fokus je na mjerljivim pokazateljima i konkretnim poboljšanjima. Testiramo, analiziramo i optimizujemo, kako biste dobili rješenje koje radi u praksi, a ne samo lijepo izgleda." icon="fa solid fa-square-poll-vertical" /></div>
            <div class="mt-5"><x-about-card title="Direktna komunikacija" text="Kod nas nema komplikacija i “prebacivanja” s osobe na osobu – imate direktan kontakt s timom koji radi na Vašem projektu. Jasno dogovaramo korake, rokove i prioritete, te Vas redovno informišemo o napretku. Na taj način štedimo vrijeme, izbjegavamo nesporazume i osiguravamo da dobijete rješenje koje tačno odgovara Vašim ciljevima." icon="fa-regular fa-message" /></div>
            <div class="mt-5"><x-about-card title="Kreativnost & tehnička preciznost" text="Vjerujemo da vrhunski web nastaje tek kada se spoje dobar dizajn i besprijekorna izvedba. Zato gradimo stranice koje vizuelno privlače pažnju, ali su istovremeno brze, stabilne, sigurne i funkcionalne na svim uređajima. Svaki detalj – od tipografije i strukture sadržaja do optimizacije i performansi – radimo precizno, kako bi krajnji rezultat bio i lijep i učinkovit." icon="fa-solid fa-gear" /></div>

        </div>

    </div>





</section>

<!-- <section class="help">
    <div class="flex flex-col mx-auto px-16 max-w-screen-2xl justify-between py-10 md:py-10">
        <h2 class="font-heading text-5xl text-center">Proces rada</h2>
        <div class="flex flex-col mb-10 md:flex-row md:max-w-screen-2xl md:justify-between mt-20">
            <div class="flex gap-x-3 mb-5">
                <div class="w-18 h-18 bg-secondary rounded-2xl font-heading text-4xl justify-center items-center flex">1.</div>
                <div class="bg-primary rounded-2xl font-heading text-xl justify-center items-center flex text-default px-4 ">Planiranje</div>
            </div>
            <div class="flex gap-x-3 mb-5">
                <div class="w-18 h-18 bg-secondary rounded-2xl font-heading text-4xl justify-center items-center flex">2.</div>
                <div class="bg-primary rounded-2xl font-heading text-xl justify-center items-center flex text-default px-4 ">Dizajn & razvoj</div>
            </div>
            <div class="flex gap-x-3 mb-5">
                <div class="w-18 h-18 bg-secondary rounded-2xl font-heading text-4xl justify-center items-center flex">3.</div>
                <div class="bg-primary rounded-2xl font-heading text-xl justify-center items-center flex text-default px-4 ">Podrška & rast</div>
            </div>
        </div>
        <div class="bg-secondary py-5 px-8 flex rounded-2xl">
            <p>Planiranje: ovo je inicijalna faza u procesu izrade web stranice. U ovoj fazi se upoznajemo sa klijentom i specifičnostima njegovog posla i niše. Ova faza se sastoji od tri koraka i to: Inicijalni sastanak, kreiranje pravca djelovanja i potpisivanje ugovora.</p>
        </div>

    </div>

</section> -->

<section class="help" x-data="{ step: 1 }">
    <div class="flex flex-col mx-auto px-5 md:px-16 max-w-screen-2xl justify-between pb-5 md:py-10">
        <h2 class="font-heading text-5xl text-center">Proces rada</h2>

        <!-- Step buttons -->
        <div class="flex flex-col mb-10 md:flex-row md:max-w-screen-2xl md:justify-between mt-20">
            <button @click="step = 1"
                :class="step === 1 ? 'bg-primary text-default' : 'bg-secondary text-black'"
                class="flex gap-x-3 mb-5 rounded-2xl font-heading text-2xl items-center py-4 px-6">
                1. Planiranje
            </button>

            <button @click="step = 2"
                :class="step === 2 ? 'bg-primary text-default' : 'bg-secondary text-black'"
                class="flex gap-x-3 mb-5 rounded-2xl font-heading text-2xl items-center py-4 px-6">
                2. Dizajn & razvoj
            </button>

            <button @click="step = 3"
                :class="step === 3 ? 'bg-primary text-default' : 'bg-secondary text-black'"
                class="flex gap-x-3 mb-5 rounded-2xl font-heading text-2xl items-center py-4 px-6">
                3. Podrška & rast
            </button>
        </div>

        <!-- Dynamic content with transitions -->
        <div class="bg-secondary py-5 px-8 flex rounded-2xl relative min-h-[180px]">
            <template x-if="step === 1" x-transition>
                <p class="absolute pe-3"><b>Planiranje:</b> ovo je inicijalna faza u procesu izrade web stranice. U ovoj fazi se upoznajemo sa klijentom i specifičnostima njegovog posla i niše. Ova faza se sastoji od tri koraka: Inicijalni sastanak, kreiranje pravca djelovanja i potpisivanje ugovora.</p>
            </template>

            <template x-if="step === 2" x-transition>
                <p class="absolute"><b>Dizajn & razvoj:</b> nakon planiranja prelazimo na vizuelni identitet i tehničku realizaciju. Fokus je na korisničkom iskustvu, responzivnosti i brzini.</p>
            </template>

            <template x-if="step === 3" x-transition>
                <p class="absolute"><b>Podrška & rast:</b> nakon lansiranja sajta pružamo podršku, održavanje i optimizaciju, uz savjetovanje za dalji rast i razvoj poslovanja.</p>
            </template>
        </div>
    </div>
    <div class="flex flex-col mx-auto px-5 md:px-16 max-w-screen-2xl justify-between pb-5 md:py-5">
        <p class="bg-primary rounded-2xl py-8 px-10 font-heading text-3xl text-center text-default">“Vjerujemo da snažna web prisutnost počinje
            razumijevanjem firme — a ne samo izradom stranice.”</p>
    </div>
</section>

<section class=" bg-secondary py-8 mt-8">
    <div class="flex flex-col mx-auto px-5 md:px-16 max-w-screen-2xl justify-between pb-5 md:py-5 md:mt-5">
        <h2 class="font-heading text-5xl text-center">Naš tim</h2>
        <p class="font-body text-center mt-8 text-xl">Svaki kolektiv pa i društvo počiva na kraju na leđima pojedinca. Ovo su pojedinci na kojima počiva naš kolektiv.</p>
        <grid class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-4">
            <div><x-team-member name="Ramiz Maksumic" position="Web dizajn" image="{{ asset('images/team/default.jpg') }}" /></div>
            <div><x-team-member name="Irma Kajan" position="Direktorica" image="{{ asset('images/team/Irma.jpg') }}" /></div>
            <div><x-team-member name="Maher Abu Ayman al Osta" position="Google ads specialist" image="{{ asset('images/team/Maher.jpg') }}" /></div>
            <div><x-team-member name="Elvis Šabić" position="Fotograf" image="{{ asset('images/team/Elvis.jpg') }}" /></div>
        </grid>

    </div>

</section>

<section class="py-20">
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