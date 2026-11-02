<?php

namespace Tests\Feature;

use App\Http\Controllers\ContactController;
use App\Livewire\DigitalniSavjetnik;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Tests\TestCase;

class InquiryIntegrationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutVite();
        Http::preventStrayRequests();
    }

    public function test_public_pages_use_central_inquiry_cta_instead_of_legacy_forms(): void
    {
        foreach (['/usluge', '/izrada-web-stranica', '/izrada-web-aplikacija', '/digitalni-marketing', '/google-ads', '/pr-komunikacija', '/foto-video', '/branding', '/team-building', '/b4b', '/o-nama', '/kontakt', '/portfolio'] as $url) {
            $response = $this->get($url)->assertOk()
                ->assertSee('Hajde da razgovaramo o vašem projektu.')
                ->assertSee('Odaberite uslugu, odgovorite na nekoliko kratkih pitanja')
                ->assertDontSee('Naruči uslugu')->assertDontSee('send-order', false)
                ->assertDontSee('google.com/recaptcha', false);
            $xpath = $this->xpath($response->getContent());
            $this->assertSame(1, $xpath->query('//main//a[@href="'.route('project-inquiry').'"]')->length, $url);
            $this->assertSame(0, $xpath->query('//main//form')->length, $url);
        }
    }

    public function test_desktop_and_mobile_navigation_link_to_inquiry(): void
    {
        $response = $this->get('/')->assertOk()->assertDontSee('Digitalni savjetnik');
        $xpath = $this->xpath($response->getContent());
        $links = $xpath->query('//header//a[@href="'.route('project-inquiry').'"]');
        $this->assertSame(2, $links->length);
        foreach ($links as $link) {
            $this->assertStringContainsString('Zatraži ponudu', $link->textContent);
        }
        $this->assertSame(0, $xpath->query('//header//a[contains(@href,"digitalni-savjetnik")]')->length);
    }

    public function test_advisor_url_permanently_redirects_to_working_inquiry_page(): void
    {
        $this->get('/digitalni-savjetnik')->assertStatus(301)->assertRedirect('/zatrazi-ponudu');
        $this->get(route('digitalni-savjetnik'))->assertStatus(301);
        $this->get('/zatrazi-ponudu')->assertOk()->assertSeeLivewire(\App\Livewire\ProjectInquiry::class);
        Http::assertNothingSent();
    }

    public function test_retired_livewire_component_cannot_call_advisor_api(): void
    {
        Livewire::test(DigitalniSavjetnik::class)->assertStatus(410);
        Http::assertNothingSent();
    }

    public function test_all_legacy_embeds_are_replaced_including_unrouted_templates(): void
    {
        foreach (['services', 'web-design', 'web-dev', 'web-aplikacije', 'social-media', 'google-ads', 'pr', 'foto-video', 'branding', 'team-building', 'b4b', 'about-us', 'contact', 'portfolio', 'price'] as $view) {
            $source = file_get_contents(resource_path('views/'.$view.'.blade.php'));
            $this->assertStringContainsString('<x-project-inquiry-cta />', $source, $view);
            $this->assertStringNotContainsString('<x-form', $source, $view);
        }
        $this->assertSame(ContactController::class.'@send', Route::getRoutes()->getByName('send.order')->getActionName());
        $this->assertFileExists(app_path('Models/Order.php'));
        $this->assertFileExists(resource_path('views/components/form.blade.php'));
    }

    private function xpath(string $html): \DOMXPath
    {
        $doc = new \DOMDocument;
        @$doc->loadHTML('<?xml encoding="UTF-8">'.$html);

        return new \DOMXPath($doc);
    }
}
