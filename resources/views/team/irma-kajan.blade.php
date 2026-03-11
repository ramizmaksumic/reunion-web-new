@extends('layouts.site')

@section('title', 'Irma Kajan | PR, Event & Digital Marketing Lead')
@section('meta_description', 'Dugogodišnje iskustvo u oblasti marketinga, digitalnog marketinga i medija. Fokusirana na razvoj i vođenje projekata iz oblasti marketinga i web developmenta.')
@section('meta_keywords', 'Irma Kajan, PR, Event, Digital Marketing, Reunion')

@section('og_title', 'Irma Kajan | PR, Event & Digital Marketing Lead')
@section('og_description', 'Saznajte više o Irma Kajan, našem iskusnom PR, Event i Digital Marketing voditelju koji je ključni član našeg tima. Otkrijte njegovu stručnost, projekte i doprinos razvoju inovativnih web rješenja.')
@section('og_image', asset('images/team/Irma.jpg'))

@section('content')

<section class="bg-gray-50 py-16">
    <div class="max-w-screen-2xl px-5 md:px-16 mx-auto">

        <div class="bg-white shadow-xl rounded-2xl overflow-hidden grid grid-cols-1 md:grid-cols-3">

            {{-- LIJEVA KOLONA --}}
            <aside class="bg-gray-900 text-white p-8 md:col-span-1">

                {{-- SLIKA --}}
                <div class="flex flex-col items-center text-center">
                    <img src="/images/team/Irma.jpg"
                        class="w-40 h-40 object-cover object-top rounded-full border-4 border-white shadow-lg mb-4">

                    <h1 class="text-2xl font-bold font-body">Irma Kajan</h1>
                    <p class="text-white mt-1 font-body">PR, Event & Digital Marketing Lead</p>
                </div>

                {{-- INFO --}}
                <div class="mt-8 space-y-3 text-sm">
                    <p><strong>Email:</strong> info@reunionagencija.com</p>
                    <p><strong>Telefon:</strong> +387 61 091 118</p>
                    <p><strong>Lokacija:</strong> Mostar</p>
                </div>

                {{-- SKILLS --}}
                <div class="mt-10">
                    <h3 class="uppercase text-sm text-gray-400 mb-3 font-body">Ključne vještine</h3>

                    <div class="flex flex-wrap gap-2 font-body">
                        <span class="bg-white/10 px-3 py-1 rounded-full text-sm">Social media</span>
                        <span class="bg-white/10 px-3 py-1 rounded-full text-sm">Meta ads</span>
                        <span class="bg-white/10 px-3 py-1 rounded-full text-sm">PR</span>
                        <span class="bg-white/10 px-3 py-1 rounded-full text-sm">Kreator sadržaja</span>
                        <span class="bg-white/10 px-3 py-1 rounded-full text-sm">Grafički dizajn</span>
                        <span class="bg-white/10 px-3 py-1 rounded-full text-sm">Branding</span>
                        <span class="bg-white/10 px-3 py-1 rounded-full text-sm">Storytelling</span>
                        <span class="bg-white/10 px-3 py-1 rounded-full text-sm">Edukator</span>

                    </div>
                </div>

                {{-- CTA --}}
                <a href="/kontakt"
                    class="block mt-10 bg-primary text-center py-3 rounded-xl font-semibold hover:opacity-90 transition">
                    Kontaktirajte me
                </a>

            </aside>

            {{-- DESNA KOLONA --}}
            <main class="p-10 md:col-span-2 space-y-10">

                {{-- O MENI --}}
                <div>
                    <h2 class="text-2xl font-bold mb-4">Biografija</h2>

                    <p class="text-gray-700 leading-relaxed mb-4">
                        Dugogodišnje iskustvo u oblasti marketinga, digitalnog marketinga i medija.
                        Fokusirana na razvoj i vođenje projekata iz oblasti marketinga i web developmenta.
                    </p>


                </div>

                {{-- ISKUSTVO --}}
                <div>
                    <h2 class="text-2xl font-bold mb-4">Iskustvo & vještine</h2>

                    <div class="space-y-6">

                        <div>
                            <ul>
                                <li> <i class="fas fa-check-circle text-green-500 mr-2 mt-4"></i> Više od 100 realiziranih marketinških projekata </li>
                                <li> <i class="fas fa-check-circle text-green-500 mr-2 mt-4"></i> Menadžer za online poslovanje i internet marketing </li>
                                <li> <i class="fas fa-check-circle text-green-500 mr-2 mt-4"></i> Više od 50 dokumenata: planovi, strategije</li>
                                <li> <i class="fas fa-check-circle text-green-500 mr-2 mt-4"></i> 500+ META kampanja </li>


                            </ul>
                        </div>

                    </div>
                </div>

                {{-- PROJEKTI --}}
                <div>
                    <h2 class="text-2xl font-bold mb-4">Istaknuti projekti</h2>

                    <ul class="space-y-2 text-gray-700">
                        <li><a href="https://hercegovina.ba/" class="font-bold" target="_blank">Turistička zajednica HNK</a> – content creator</li>
                        <li><a href="#" class="font-bold" target="_blank">Brandyourself</a> - edukator</li>
                        <li><a href="https://hotel-swissplus.com/" class="font-bold" target="_blank">Hotel Swiss Plus</a> – social media</li>
                        <li><a href="https://hercegovinalijek.ba/" class="font-bold" target="_blank">Hercegovinalijek</a> - content creator</li>
                        <li><a href="https://autoprevoz.ba/" class="font-bold" target="_blank">Autoprevoz</a> - content creator</li>

                        <li><a href="https://perfectfit.ba/" class="font-bold" target="_blank">Perfect Fit</a>– content creator</li>

                    </ul>
                </div>

            </main>

        </div>

    </div>
</section>

@endsection