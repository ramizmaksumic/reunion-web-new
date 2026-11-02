<?php

namespace App\Support;

class InquiryQuestions
{
    public static function services(): array
    {
        return ['web' => 'Web stranica', 'webshop' => 'Webshop', 'app' => 'Web aplikacija', 'seo' => 'SEO optimizacija', 'marketing' => 'Digitalni marketing i oglašavanje', 'branding' => 'Brending i grafički dizajn', 'other' => 'Ostalo'];
    }

    public static function fields(string $service): array
    {
        $yes = ['Da', 'Ne'];
        $unsure = ['Da', 'Ne', 'Nisam siguran'];
        $ready = ['Da', 'Djelimično', 'Ne'];
        $q = fn ($label, $options = [], $type = 'select', $optional = false, $when = null) => compact('label', 'options', 'type', 'optional', 'when');
        $fields = match ($service) {
            'web' => [
                'existing' => $q('Imate li već web stranicu?', $yes),
                'url' => $q('Adresa postojeće web stranice', [], 'url', true, ['existing', 'Da']),
                'goal' => $q('Šta želite uraditi?', ['Izrada nove web stranice', 'Redizajn postojeće', 'Nadogradnja postojeće', 'Nisam siguran']),
                'kind' => $q('Kakva vam je web stranica potrebna?', ['Prezentacijska', 'Korporativna', 'Višejezična', 'Nisam siguran']),
                'content' => $q('Imate li pripremljene tekstove i fotografije?', $ready),
                'features' => $q('Koje dodatne funkcionalnosti su vam potrebne?', ['Blog / novosti', 'Više jezika', 'Online rezervacije', 'Napredne kontakt forme', 'Integracije s drugim sistemima', 'Ostalo', 'Nisam siguran'], 'multi'),
                'references' => $q('Imate li primjere web stranica ili dizajna koji vam se sviđaju?', [], 'textarea', true),
                'platform' => $q('Znate li na kojoj tehnologiji radi postojeća stranica?', ['WordPress', 'Laravel', 'Drugo', 'Ne znam'], 'select', true, ['existing', 'Da']),
            ],
            'webshop' => [
                'existing' => $q('Imate li postojeći webshop?', $yes),
                'url' => $q('Adresa postojećeg webshopa', [], 'url', true, ['existing', 'Da']),
                'goal' => $q('Šta želite uraditi?', ['Novi webshop', 'Redizajn', 'Migracija', 'Nadogradnja']),
                'products' => $q('Koliko proizvoda planirate prodavati?', ['Do 50', '50–200', '200–1.000', 'Više od 1.000', 'Nisam siguran']),
                'platform' => $q('Na kojoj platformi radi postojeći webshop?', ['WooCommerce', 'Shopify', 'Magento', 'Drugo', 'Ne znam'], 'select', true, ['existing', 'Da']),
                'payments' => $q('Koje načine plaćanja želite?', ['Pouzećem', 'Kartično plaćanje', 'Bankovna uplata', 'Nisam siguran'], 'multi'),
                'integrations' => $q('Trebate li posebne integracije?', ['Dostavne službe', 'Skladište / ERP', 'Računovodstveni sistem', 'Ostalo', 'Nisam siguran'], 'multi'),
                'content' => $q('Jesu li fotografije, opisi i cijene proizvoda pripremljeni?', $ready),
                'entry' => $q('Ko će unositi proizvode?', ['Mi ćemo unositi proizvode', 'Potrebno je da Reunion unese proizvode', 'Dogovorit ćemo naknadno']),
                'references' => $q('Imate li primjere webshopova čiji vam se dizajn sviđa?', [], 'textarea', true),
            ],
            'app' => [
                'problem' => $q('Koji poslovni problem želite riješiti aplikacijom?', [], 'textarea'),
                'users' => $q('Ko će koristiti aplikaciju?', ['Zaposleni', 'Klijenti', 'Poslovni partneri', 'Javnost', 'Drugo'], 'multi'),
                'features' => $q('Koje su najvažnije funkcionalnosti aplikacije?', [], 'textarea'),
                'existing' => $q('Postoji li već aplikacija koju želite unaprijediti ili zamijeniti?', $yes),
                'references' => $q('Postojeća aplikacija ili primjer sličnog rješenja', [], 'textarea', true),
                'integration' => $q('Treba li se aplikacija povezivati s drugim sistemima?', $unsure),
                'integration_details' => $q('Opišite povezivanje s drugim sistemima', [], 'textarea', true, ['integration', 'Da']),
                'documentation' => $q('Imate li tehničku specifikaciju ili projektnu dokumentaciju?', $yes),
            ],
            'seo' => [
                'url' => $q('Adresa vaše web stranice', [], 'url'),
                'market' => $q('Koje tržište želite ciljati?', ['Lokalno', 'Bosna i Hercegovina', 'Regionalno', 'Međunarodno']),
                'goal' => $q('Šta vam je primarni cilj?', ['Više upita', 'Više prodaje', 'Bolja lokalna vidljivost', 'Veći organski promet', 'Nisam siguran']),
                'previous' => $q('Da li ste ranije radili SEO optimizaciju?', $unsure),
            ],
            'marketing' => [
                'services' => $q('Koje usluge vas zanimaju?', ['Google Ads', 'Meta Ads', 'Upravljanje društvenim mrežama', 'Strategija digitalnog marketinga', 'Nisam siguran'], 'multi'),
                'goal' => $q('Šta je vaš glavni cilj?', ['Više upita', 'Povećanje prodaje', 'Prepoznatljivost brenda', 'Drugo']),
                'existing' => $q('Imate li postojeće kampanje?', $yes),
                'ad_budget' => $q('Okvirni mjesečni budžet za oglašavanje (bez naknade agenciji)', ['Do 500 KM', '500–1.500 KM', '1.500–3.000 KM', 'Više od 3.000 KM', 'Nisam siguran'], 'select', true),
            ],
            'branding' => [
                'needs' => $q('Šta vam je potrebno?', ['Logo', 'Kompletan vizuelni identitet', 'Brand guidelines', 'Grafički materijali', 'Ostalo'], 'multi'),
                'existing' => $q('Imate li postojeći vizuelni identitet?', ['Da', 'Ne', 'Potrebno je osvježenje']),
                'usage' => $q('Gdje će se dizajn koristiti?', ['Digitalni kanali', 'Štampani materijali', 'Ambalaža', 'Više namjena'], 'multi'),
                'references' => $q('Imate li primjere dizajna koji vam se sviđaju?', [], 'textarea', true),
            ],
            'other' => [
                'kind' => $q('Koja usluga ili vrsta projekta vas zanima?', [], 'text'),
                'goal' => $q('Šta želite postići?', [], 'textarea'),
                'references' => $q('Imate li postojeće materijale ili reference?', [], 'textarea', true),
            ],
            default => [],
        };
        if (! $fields) {
            return [];
        }
        $budgets = match ($service) {
            'app' => ['Do 5.000 KM', '5.000–15.000 KM', '15.000–30.000 KM', 'Više od 30.000 KM'],
            'webshop' => ['Do 3.000 KM', '3.000–6.000 KM', '6.000–12.000 KM', 'Više od 12.000 KM'],
            'web' => ['Do 1.500 KM', '1.500–3.000 KM', '3.000–6.000 KM', 'Više od 6.000 KM'],
            default => ['Do 500 KM', '500–1.500 KM', '1.500–3.000 KM', 'Više od 3.000 KM'],
        };

        return $fields + [
            'description' => $q(in_array($service, ['app', 'other']) ? 'Dodatne informacije' : 'Opis projekta', [], 'textarea', in_array($service, ['app', 'other'])),
            'start' => $q('Kada biste željeli započeti projekt?', ['Što prije', 'U narednih 1–3 mjeseca', 'Kasnije', 'Nisam siguran']),
            'budget' => $q($service === 'marketing' ? 'Budžet za usluge agencije (bez troškova oglašavanja)' : 'Koliki je okvirni budžet?', [...$budgets, 'Nisam siguran, potrebna mi je procjena.'], 'select', true),
        ];
    }

    public static function visible(string $service, array $answers): array
    {
        return array_filter(self::fields($service), fn ($q) => ! $q['when'] || ($answers[$q['when'][0]] ?? null) === $q['when'][1]);
    }
}
