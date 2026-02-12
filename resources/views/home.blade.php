@extends('layouts.site')

@section('content')

<div>
    <x-hero-section />
    <section class="bg-secondary py-16">


        <div class="flex flex-col justify-center md:flex-row md:max-w-screen-2xl md:mx-auto px-6 py-3 f"">
            <div class=" flex flex-col font-heading w-full md:w-1/3 mb-5">
            <p class="text-6xl">1.</p>
            <h2 class="font-body text-4xl mt-5">Za početak</h2>
        </div>
        <div class="flex flex-col font-body w-full md:w-2/3">

            <div class="flex flex-col justify-between md:flex-row gap-x-5 gap-y-4">
                <card class="bg-default py-5 px-8 rounded-2xl md:w-1/3 hover:shadow-xl transition duration-450">
                    <h3 class="font-heading mb-5 font-bold">Ko smo i šta radimo</h3>
                    <p class="mb-8">Reunion je mali tim ljudi, profesionalaca sa preko 10 godina iskustva u marketingu.
                        Razumijemo tržište i možemo preuzeti vaš marketing ili neke njegove djelove – od strategije do realizacije.
                        Naša najveća snaga u tome što vaše budžete možemo maksimalno optimizirati, znanjem,
                        kreativnosti i iskustvom koje nudimo svakom klijentu, u svakom projektu.
                    </p>
                    <a href="/o-nama" class="font-heading font-medium">vidi više &rarr;</a>
                </card>
                <card class="bg-default py-5 px-8 rounded-2xl md:w-1/3 hover:shadow-xl transition duration-450">
                    <h3 class="font-heading mb-5 font-bold">Šta to vama znači</h3>
                    <p class="mb-8">Pametna marketinška rješenja nisu uvijek skupa.
                        Našim radom, zajedno sa klijentima, i urađenim projektima dokazujemo da marketinška i IT rješenja nisu samo za „velike“. <br><br>
                        Dobar sistem, kvalitetne procese i vrhunske rezultate mogu dobiti svi ako rade planski, posvećeno i sa timom koji ima znanje.

                    </p>
                    <a href="/o-nama" class="font-heading font-medium">vidi više &rarr;</a>
                </card>
                <card class="bg-default py-5 px-8 rounded-2xl md:w-1/3 hover:shadow-xl transition duration-450">
                    <h3 class="font-heading mb-5 font-bold">Zašto odabarati nas </h3>
                    <p class="mb-8">Znamo kako napraviti strategiju koja radi i donosi rezultate.
                        Više od 10 godina iskustva u marketingu, kao full marketing agencija, omogućava nam da znamo tačno „šta radi“ i donosi rezultate u vašoj branši.
                        Uz to naša IT rješenja i ideje vam pomažu da olakšate i pojednostavite sistema rada, kako za vaše potrebe tako i za vašeg kupca.
                    </p>
                    <a href="/o-nama" class="font-heading font-medium">vidi više &rarr;</a>
                </card>

            </div>

            <div class="mt-10">

                <!-- <x-button /> -->
            </div>
        </div>
</div>


</section>
<section class="py-16">


    <div class="flex flex-col justify-center md:flex-row md:max-w-screen-2xl md:mx-auto px-6 py-3"">
            <div class=" flex flex-col font-heading md:w-1/3 mb-5">
        <p class="text-6xl">2.</p>
        <h2 class="font-body text-4xl mt-5">Usluge koje nudimo</h2>
    </div>
    <div class="flex flex-col font-body md:w-2/3">
        <div class="grid grid-cols-2 gap-5">
            <a href="{{ route('web-design') }}" class="bg-secondary py-4 px-8 rounded-2xl gap-cols-4 text-center hover:shadow-md hover:bg-primary hover:text-white">Web Design</a>
            <a href="{{ route('web-dev') }}" class="bg-secondary py-4 px-8 rounded-2xl gap-cols-4 text-center hover:shadow-md hover:bg-primary hover:text-white">Web development</a>
            <a href="{{ route('social-media') }}" class="bg-secondary py-4 px-8 rounded-2xl gap-cols-4 text-center hover:shadow-md hover:bg-primary hover:text-white">Digitalni marketing</a>
            <a href="{{ route('google-ads') }}" class="bg-secondary py-4 px-8 rounded-2xl gap-cols-4 text-center hover:shadow-md hover:bg-primary hover:text-white">Google & Meta ads</a>
            <a href="{{ route('branding') }}" class="bg-secondary py-4 px-8 rounded-2xl gap-cols-4 text-center hover:shadow-md hover:bg-primary hover:text-white">Branding & Dizajn</a>
            <a href="{{ route('pr-komunikacija') }}" class="bg-secondary py-4 px-8 rounded-2xl gap-cols-4 text-center hover:shadow-md hover:bg-primary hover:text-white">PR & Eventi</a>
            <a href="{{ route('team-building') }}" class="bg-secondary py-4 px-8 rounded-2xl gap-cols-4 text-center hover:shadow-md hover:bg-primary hover:text-white">Team Building</a>
        </div>
        <p class="mt-5 text-sm">*Niste sigurni odakle krenuti?  - <span class="font-medium">Počnimo sa strategijom.</span></p>
    </div>


</section>
<!-- <section class=" bg-secondary py-16 w-full">


    <div class="flex flex-col justify-center md:flex-row md:max-w-screen-2xl md:mx-auto px-6 py-3"">
        <div class=" flex flex-col font-heading md:w-1/3 mb-5">
        <p class="text-6xl">3.</p>
        <h2 class="font-body text-4xl mt-5">Neki naši radovi</h2>
    </div>
    <div class="carouselflex flex-col font-body w-2/3">

        <div class="flex gap-3 rounded-2xl">
            <img src=" {{ URL::asset('/images/Hercegovinalijek.png') }}" alt="Hercegovina lijek" class="w-124">
            <img src="{{ URL::asset('/images/Gaj.png') }}" alt="Apoteka Gaj" class="w-124">

        </div>
        <div class="mt-10 flex justify-between items-center align-baseline font-heading">
            <x-button></x-button>
            <div class="flex gap-24 md:gap-84">
                <a href="">&larr; prev</a>
                <a href="">next &rarr;</a>
            </div>
        </div>




    </div>
    </div>

</section> -->

<section class="bg-secondary py-16 w-full">
    <div class="flex flex-col justify-center md:flex-row md:max-w-screen-2xl md:mx-auto px-6 py-3">

        <!-- Lijevi dio -->
        <div class="flex flex-col font-heading md:w-1/3 mb-5">
            <p class="text-6xl">3.</p>
            <h2 class="font-body text-4xl mt-5">Neki naši radovi</h2>
        </div>

        <!-- Carousel -->
        <div
            class="carousel flex flex-col font-body w-full md:w-2/3"
            x-data="{ active: 0, items: [
                '{{ URL::asset('/images/Hercegovinalijek.png') }}',
                '{{ URL::asset('/images/Gaj.png') }}',
                '{{ URL::asset('/images/Nela.png') }}',
                '{{ URL::asset('/images/zou silic.png') }}'
            ] }">
            <!-- Slike -->
            <div class="flex justify-between">
                <template x-for="(item, index) in items" :key="index">
                    <img
                        :src="item"
                        x-show="active === index"
                        class="rounded-2xl w-full md:w-full transition duration-500 ease-in-out">
                </template>
            </div>

            <!-- Navigacija -->

            <div class="mt-10 flex justify-end gap-x-10 items-center font-heading relative">
                <div class="bg-primary text-default py-3 px-5 rounded-2xl font-heading text-md absolute left-0">
                    <a href="{{ route('portfolio') }}">Vidi sve radove &rarr;</a>
                </div>
                <button
                    @click="active = (active - 1 + items.length) % items.length"
                    class="px-4 py-2 cursor-pointer font-bold hover:text-primary">
                    &larr; Pre
                </button>

                <button
                    @click="active = (active + 1) % items.length"
                    class="px-4 py-2 cursor-pointer font-bold hover:text-primary">
                    Slje &rarr;
                </button>
            </div>
        </div>
    </div>
</section>




</div>
@endsection