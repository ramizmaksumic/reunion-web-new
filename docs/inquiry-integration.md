# Integracija centralne forme za upite

Lokalna implementacija; ništa nije objavljeno na produkciju. ProjectInquiry, njeni predlošci, validacija, draft i email logika nisu mijenjani u ovoj fazi.

## Izmijenjene i dodane datoteke

Nova zajednička CTA komponenta:
- resources/views/components/project-inquiry-cta.blade.php

Zamijenjene kompletne sekcije stare forme pozivom iste komponente:
- resources/views/services.blade.php
- resources/views/web-design.blade.php
- resources/views/web-dev.blade.php
- resources/views/web-aplikacije.blade.php
- resources/views/social-media.blade.php
- resources/views/google-ads.blade.php
- resources/views/pr.blade.php
- resources/views/foto-video.blade.php
- resources/views/branding.blade.php
- resources/views/team-building.blade.php
- resources/views/b4b.blade.php
- resources/views/about-us.blade.php
- resources/views/contact.blade.php
- resources/views/portfolio.blade.php
- resources/views/price.blade.php

Ostale izmjene:
- resources/views/partials/nav.blade.php: desktop dugme i mobilna stavka sada vode na project-inquiry i prikazuju „Zatraži ponudu“; dizajn je zadržan.
- resources/views/layouts/site.blade.php: uklonjeno globalno učitavanje Google reCAPTCHA skripte jer više nema javnih prikaza stare forme.
- routes/web.php: stari URL Digitalnog savjetnika vraća 301 na /zatrazi-ponudu; naziv stare rute zadržan radi kompatibilnosti.
- app/Livewire/DigitalniSavjetnik.php: boot vraća 410; blokira novo montiranje i zahtjeve ranije otvorenih Livewire sesija prije izvršavanja AI logike.
- tests/Feature/InquiryIntegrationTest.php: novi integracijski testovi.
- docs/inquiry-integration.md: ovaj izvještaj.

Vite build je obnovio ignorisane public/build datoteke. Prethodno postojeće lokalne izmjene su sačuvane.

## Javne funkcionalnosti koje su uklonjene

Stara sekcija „Naruči uslugu“ i x-form više se ne prikazuju ni u jednom od 15 predložaka koji su je koristili. To obuhvata stranice usluga, Kontakt, O nama i Portfolio: svi javni upiti sada koriste isti CTA prema /zatrazi-ponudu. CTA nema parametar usluge, prema traženom linku. Predlošci price i web-aplikacije trenutno nemaju aktivne zasebne rute, ali su ažurirani da pri eventualnoj ponovnoj upotrebi ne vraćaju staru formu. Nove rute za njih nisu dodane.

Digitalni savjetnik više nema javnu stranicu ni navigacijsku stavku. Pristup starom URL-u trajno preusmjerava na novu formu. Stari Livewire zahtjevi su deaktivirani i ne mogu pozvati AI servis.

## Evidencija Digitalnog savjetnika i zadržanog backenda

Stari alat nema zaseban kontroler. Njegova jedina ruta je ranije vraćala pages.digitalni-savjetnik, koji montira App\Livewire\DigitalniSavjetnik. Komponenta renderuje livewire.digitalni-savjetnik i koristi App\Services\AiAdvisorService, a servis čita config/ai.php. Pretragom app, resources, routes, config i tests nisu pronađeni drugi korisnici ovog servisa ili AI konfiguracije. Nisu pronađeni posebni JS/CSS resursi alata.

Radi nedestruktivne deaktivacije, komponenta, oba stara viewa, AiAdvisorService i config/ai.php ostaju u repozitoriju. Neaktivni kod i konfiguracija mogu se ukloniti u zasebnoj fazi. Nikakve tajne nisu mijenjane.

Order model, migracije, historijski podaci, javni dokumenti, ContactController, SendMail, POST send-order, x-form komponenta i ReCaptcha validacijsko pravilo ostaju sačuvani. POST endpoint je i dalje aktivan radi traženog zadržavanja backenda, ali ga javne stranice više ne prikazuju. reCAPTCHA konfiguracija nije brisana; uklonjena je samo nepotrebna frontend skripta.

## Provjere

- Novi integracijski testovi: 5 prolaznih, 152 assertions. Provjereno 13 aktivnih stranica, CTA linkovi, odsustvo starih formi, desktop i mobilna navigacija, 301 redirect, dostupnost nove forme, 410 za stari alat, odsustvo AI poziva i zadržavanje starog backenda. Dodatna dva neaktivna predloška provjerena su na nivou izvornog koda.
- Cijeli PHP skup: 46 prolaznih, 9 ranije poznatih padova, 523 assertions. Četiri pada su vezana za nedostajuću dashboard rutu, pet za nedostajuće /profile rute. Nisu mijenjane u ovoj fazi.
- JavaScript regresijski testovi checkbox ponašanja: 2 prolazna.
- npm.cmd run build: uspješan, 55 modula. Prvi pokušaj bio je blokiran sandbox pristupom nadređenim direktorijima; izvršavanje izvan sandboxa je uspjelo.
- git diff --check: uspješan.
- Laravel Pint za novi test: uspješan.
- route:list: potvrđene ruta nove forme i redirect stare rute.

Testovi su koristili in-memory SQLite i izolovan APP_ROUTES_CACHE=storage/framework/cache/testing-routes.php; postojeći lokalni bootstrap/cache/routes-v7.php nije brisan niti prepisan.

## Responzivnost i otvorena pitanja

CTA koristi složeni raspored na malim ekranima, dugme pune širine na najmanjim ekranima, prilagodljive razmake i tipografiju te horizontalni raspored tek na lg širini. Tekst se prelama, fleksibilna kolona ima min-w-0, a dugme lg:shrink-0. Desktop/mobile breakpointi navigacije su zadržani. HTML testovima su potvrđene obje navigacijske poveznice.

Vizuelna provjera u stvarnom pregledniku na mobilnim/tablet/desktop širinama ostaje otvorena: ovoj sesiji nije dostupan povezan preglednik. Nije tvrđeno da je izvršena vizuelna ili interaktivna browser provjera.

Prije eventualnog odobrenog puštanja potrebno je obnoviti assets i Laravel route/view cache u procesu izdanja; postojeći lokalni route cache može inače nastaviti prikazivati stari URL iako source ruta sadrži redirect. Nije izvršen deploy niti mijenjana produkcijska konfiguracija. Stare Order podatke i javne uploadove treba posebno pregledati prije bilo kakvog uklanjanja.
