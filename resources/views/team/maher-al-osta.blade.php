@extends('layouts.site')

@section('title', 'Maher Abu Ayman Al-Osta | Digital Business Consultant ekspert za SEO i Google Ads')
@section('meta_description', 'Pionir digitalne industrije i online marketinga u Bosni i Hercegovini. ')
@section('meta_keywords', 'Maher Al-Osta, SEO, Google ads, digitalni marketing, online marketing, digitalna strategija, konsultant, BiH')

@section('og_title', 'Maher Al-Osta | Digital Business Consultant | Reunion')
@section('og_description', 'Saznajte više o Maheru Al-Osti, našem iskusnom digitalnom poslovnom konsultantu koji je ključni član našeg tima. Otkrijte njegovu stručnost, projekte i doprinos razvoju inovativnih digitalnih rješenja.')
@section('og_image', asset('images/team/Maher.jpg'))

@section('content')

<section class="bg-gray-50 py-16">
    <div class="max-w-screen-2xl px-5 md:px-16 mx-auto">

        <div class="bg-white shadow-xl rounded-2xl overflow-hidden grid grid-cols-1 md:grid-cols-3">

            {{-- LIJEVA KOLONA --}}
            <aside class="bg-gray-900 text-white p-8 md:col-span-1">

                {{-- SLIKA --}}
                <div class="flex flex-col items-center text-center">
                    <img src="/images/team/Maher.jpg"
                        class="w-40 h-40 object-cover object-top rounded-full border-4 border-white shadow-lg mb-4">

                    <h1 class="text-2xl font-bold font-body">Maher Abu Ayman Al-Osta</h1>
                    <p class="text-white mt-1 font-body">Digital Business Consultant</p>
                </div>

                {{-- INFO --}}
                <div class="mt-8 space-y-3 text-sm">
                    <p><strong>Email:</strong> info@reunionagencija.com</p>
                    <p><strong>Telefon:</strong> +387 61 606 559</p>
                    <p><strong>Lokacija:</strong> Sarajevo</p>
                </div>

                {{-- SKILLS --}}
                <div class="mt-10">
                    <h3 class="uppercase text-sm text-gray-400 mb-3 font-body">Ključne vještine</h3>

                    <div class="flex flex-wrap gap-2 font-body">
                        <span class="bg-white/10 px-3 py-1 rounded-full text-sm">SEO</span>
                        <span class="bg-white/10 px-3 py-1 rounded-full text-sm">SEM</span>
                        <span class="bg-white/10 px-3 py-1 rounded-full text-sm">Webshop</span>
                        <span class="bg-white/10 px-3 py-1 rounded-full text-sm">eCommerce</span>
                        <span class="bg-white/10 px-3 py-1 rounded-full text-sm">Google ads</span>
                        <span class="bg-white/10 px-3 py-1 rounded-full text-sm">Google Analytics</span>
                        <span class="bg-white/10 px-3 py-1 rounded-full text-sm">Edukator</span>
                        <span class="bg-white/10 px-3 py-1 rounded-full text-sm">Konsultant</span>

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
                        Pionir digitalne industrije i online marketinga u Bosni i Hercegovini. Certificirani je Google trener, stručnjak za Google oglase (Google Ads), SEO optimizaciju sadržaja (Search Engine Optimization) te Googole analitiku (Google Analytics).
                        Njegova ekspertiza obuhvata razvoj i implementaciju sveobuhvatnih digitalnih marketinških strategija, PR kampanja i online komunikacije za mnoge renomirane kompanije.
                    </p>

                </div>

                {{-- ISKUSTVO --}}
                <div>
                    <h2 class="text-2xl font-bold mb-4">Iskustvo & vještine</h2>

                    <div class="space-y-6">

                        <div>
                            <ul>
                                <li> <i class="fas fa-check-circle text-green-500 mr-2 mt-4"></i> Više od 500 realiziranih Google ads kampanja </li>
                                <li> <i class="fas fa-check-circle text-green-500 mr-2 mt-4"></i> Specijalista za SEO (Search Engine Optimization) i SEM (Search Engine Marketing)</li>
                                <li> <i class="fas fa-check-circle text-green-500 mr-2 mt-4"></i> Strategija digitalne multichanel marketing kampanja</li>
                                <li> <i class="fas fa-check-circle text-green-500 mr-2 mt-4"></i> Razvoj specijaliziranih i informativnih web portala (dugogodišnje iskustvo: DEPO Portal, BLIN Magazin, Dnevni avaz, Akta poslovni portal, Dnevni list)</li>
                                <li> <i class="fas fa-check-circle text-green-500 mr-2 mt-4"></i> Razvoj custom, funkcionalnih i prezentacijskih web stranica, uključujući Landing Pages</li>
                                <li> <i class="fas fa-check-circle text-green-500 mr-2 mt-4"></i> Razvoj webshop-ova i e-commerc platformi uključjući integraciju e-payment sistema </li>
                                <li> <i class="fas fa-check-circle text-green-500 mr-2 mt-4"></i> Ekspertiza efikasno upravljanje ključnim riječima, frazama i kreiranje online sadržaja koji prodaje i koji osigurava optimalno pozicioniranje na Google i YouTube tražilicama. </li>
                            </ul>
                        </div>

                    </div>
                </div>

                {{-- PROJEKTI --}}
                <div>
                    <h2 class="text-2xl font-bold mb-4">Trenutno</h2>

                    <p class="text-gray-700 leading-relaxed mb-4">
                        Posljednjih 10 godina radi kao Digital Business Consultant na projektima digitalizacije, digitalne transformacije i e-Commerce rješenja, sarađujući s malim, srednjim i velikim kompanijama širom BiH i regiona.
                    </p>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Realizirao je brojne edukacije, kroz radionice i seminare iz digitalnog marketinga, online komunikacija i oglašavanja, nesebično dijeleći svoje znanje sa PR i
                        marketing menadžerima iz regiona, kao i predstavnicima medija u BiH. Mnogi od njih i danas uspješno rade u tim poljima.
                    </p>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Stalni vanjski saradnik i partner <span class="font-bold">Reunion web & marketing agencije</span>.
                    </p>
                </div>

            </main>

        </div>

    </div>
</section>

@endsection