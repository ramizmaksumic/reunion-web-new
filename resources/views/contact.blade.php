@extends('layouts.site')

@section('title', 'Kontakt | Reunion web & marketing agencija Mostar')
@section('meta_description', 'Kontaktirajte Reunion agenciju za izradu web stranica, digitalni marketing ili oglašavanje. Javite nam se telefonom, emailom ili putem forme.')
@section('meta_keywords', 'kontakt, reunion agencija mostar')

@section('og_title', 'Kontakt | Reunion agencija')
@section('og_description', 'Kontaktirajte nas za više informacija o našim uslugama.')

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
                <div class="flex flex-wrap justify-center mt-8 gap-x-5 gap-y-2">
                    <a href="https://www.facebook.com/Reunionmarketingagencija" target="_blank" class="font-heading text-base sm:text-xl hover:text-primary transition">
                        Facebook
                    </a>

                    <span class="opacity-40 hidden sm:inline">|</span>

                    <a href="https://www.instagram.com/reunion_agencija/" target="_blank" class="font-heading text-base sm:text-xl hover:text-primary transition">
                        Instagram
                    </a>

                    <span class="opacity-40 hidden sm:inline">|</span>

                    <a href="https://www.linkedin.com/company/reunion-marketing-agencija/" target="_blank" class="font-heading text-base sm:text-xl hover:text-primary transition">
                        LinkedIn
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



<x-project-inquiry-cta />
















@endsection