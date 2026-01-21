@extends('layouts.site')

@section('content')

<x-page-hero-section title="Kontakt" description="kontaktirajte nas za više informacija" />

<section class="bg-secondary">


    <div class="grid grid-cols-1 md:grid-cols-2 mx-auto px-5 md:px-16 max-w-screen-2xl justify-between ">
        <div>
            <h2 class="font-heading text-4xl mt-5">Kontakt informacije</h2>
            <div class="flex flex-col mt-10">
                <div class="flex mt-8 gap-x-5">
                    <i class="fa fa-home text-2xl"></i>
                    <p class="font-body text-xl">Blagaj bb, 88 201 Blagaj, Bosna i Hercegovina</p>
                </div>
                <div class="flex mt-8 gap-x-5">
                    <i class="fa fa-phone text-2xl"></i>
                    <p class="font-body text-xl">+387 61 091 118</p>
                </div>
                <div class="flex mt-8 gap-x-5">
                    <i class="fa fa-phone text-2xl"></i>
                    <p class="font-body text-xl">+387 61 910 161</p>
                </div>
                <div class="flex mt-8 gap-x-5">
                    <i class="fa fa-envelope text-2xl"></i>
                    <p class="font-body text-xl">info@reunionagencija.com</p>
                </div>
                <div class="flex mt-8 gap-x-5">
                    <a href="https://www.facebook.com/Reunionmarketingagencija">
                        <p class="font-heading text-xl">facebook</p>

                    </a>|
                    <a href="#">
                        <p class="font-heading text-xl">instagram</p>
                    </a>|
                    <a href="#">
                        <p class="font-heading text-xl">linkedIn</p>
                    </a>



                </div>
            </div>
        </div>
        <div class="w-full overflow-hidden rounded-2xl">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2903.35978041275!2d17.819022012382117!3d43.30672737464943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x134b6706878eca97%3A0xfed58d681b154295!2sReunion%20agencija!5e0!3m2!1sbs!2sba!4v1755677570750!5m2!1sbs!2sba"
                class="w-full h-[350px] md:h-[450px] border-0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>



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