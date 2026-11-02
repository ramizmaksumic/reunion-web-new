<?php

namespace Tests\Feature;

use App\Livewire\ProjectInquiry;
use App\Support\InquiryQuestions;
use Livewire\Livewire;
use Tests\TestCase;

class ProjectInquiryNavigationTest extends TestCase
{
    private function webAnswers(): array
    {
        return ['existing' => 'Ne', 'goal' => 'Nisam siguran', 'kind' => 'Nisam siguran', 'content' => 'Ne', 'features' => ['Blog / novosti', 'Više jezika'], 'description' => 'Predstavljanje naše firme.', 'start' => 'Kasnije'];
    }

    public function test_all_checkbox_groups_start_as_arrays_on_selection_and_preselection(): void
    {
        foreach (InquiryQuestions::services() as $service => $label) {
            foreach (InquiryQuestions::fields($service) as $key => $q) {
                if ($q['type'] !== 'multi') {
                    continue;
                }
                Livewire::test(ProjectInquiry::class)->set('service', $service)->call('next')->assertSet('answers.'.$key, []);
                Livewire::withQueryParams(['service' => $service])->test(ProjectInquiry::class)->assertSet('answers.'.$key, []);
            }
        }
    }

    public function test_step_two_boolean_checkbox_state_is_rejected_with_visible_field_error(): void
    {
        Livewire::test(ProjectInquiry::class)->set('service', 'web')->call('next')
            ->set('answers', [...$this->webAnswers(), 'features' => true])->call('next')
            ->assertSet('step', 2)->assertHasErrors(['answers.features' => 'array'])
            ->assertSee('Odaberite ponuđene vrijednosti.')
            ->set('answers.features', ['Blog / novosti'])->call('next')->assertHasNoErrors()->assertSet('step', 3);
    }

    public function test_missing_description_and_conditional_url_errors_are_visible_and_correctable(): void
    {
        $form = Livewire::test(ProjectInquiry::class)->set('service', 'web')->call('next')
            ->set('answers', [...$this->webAnswers(), 'description' => ''])->call('next')
            ->assertSet('step', 2)->assertHasErrors(['answers.description' => 'required'])
            ->assertSeeHtml('id="error-description"');
        $form->set('answers.description', 'Opis projekta')->set('answers.existing', 'Da')
            ->set('answers.url', 'not-a-url')->call('next')->assertSet('step', 2)->assertHasErrors(['answers.url' => 'url'])
            ->assertSeeHtml('id="error-url"')->set('answers.url', '')->call('next')->assertHasNoErrors()->assertSet('step', 3);
    }

    public function test_every_service_can_advance_from_step_two_and_back_with_answers_intact(): void
    {
        foreach (InquiryQuestions::services() as $service => $label) {
            $form = Livewire::test(ProjectInquiry::class)->set('service', $service)->call('next');
            $answers = [];
            foreach (InquiryQuestions::fields($service) as $key => $q) {
                if ($q['optional']) {
                    continue;
                }
                $answers[$key] = $q['type'] === 'multi' ? array_slice($q['options'], 0, 2) : ($q['options'][0] ?? ($q['type'] === 'url' ? 'https://example.test' : 'Projektni zahtjev'));
            }
            $form->set('answers', $answers)->call('next')->assertHasNoErrors()->assertSet('step', 3)
                ->call('back')->assertSet('step', 2)->assertSet('answers', $answers)
                ->call('back')->assertSet('step', 1)->call('next')->assertSet('answers', $answers)
                ->call('next')->assertSet('step', 3);
        }
    }

    public function test_checkbox_markup_has_unique_ids_labels_and_group_bindings(): void
    {
        foreach (InquiryQuestions::services() as $service => $label) {
            $form = Livewire::test(ProjectInquiry::class)->set('service', $service)->call('next');
            $doc = new \DOMDocument;
            @$doc->loadHTML('<?xml encoding="UTF-8">'.$form->html());
            $xpath = new \DOMXPath($doc);
            $seen = [];
            foreach ($xpath->query('//input[@type="checkbox"]') as $input) {
                $binding = $input->getAttribute('wire:model');
                if (! str_starts_with($binding, 'answers.')) {
                    continue;
                }
                $id = $input->getAttribute('id');
                $this->assertNotSame('', $id);
                $this->assertNotContains($id, $seen);
                $seen[] = $id;
                $this->assertSame(1, $xpath->query('//label[@for="'.$id.'"]')->length);
                $this->assertNotSame('', $input->getAttribute('value'));
            }
        }
    }

    public function test_draft_restore_and_service_switch_initialize_all_checkbox_arrays(): void
    {
        Livewire::test(ProjectInquiry::class)->call('restoreDraft', ['service' => 'webshop', 'answers' => ['existing' => 'Ne']])
            ->assertSet('answers.payments', [])->assertSet('answers.integrations', [])
            ->set('service', 'branding')->assertSet('answers.needs', [])->assertSet('answers.usage', []);
    }

    public function test_multiselect_groups_keep_distinct_answers_and_report_invalid_options(): void
    {
        Livewire::test(ProjectInquiry::class)->set('service', 'webshop')->call('next')
            ->set('answers.payments', ['Pouzećem'])->assertSet('answers.integrations', [])
            ->set('answers.integrations', ['Dostavne službe', 'Ostalo'])
            ->assertSet('answers.payments', ['Pouzećem'])
            ->set('answers.payments', ['Pouzećem', 'Bankovna uplata'])
            ->assertSet('answers.integrations', ['Dostavne službe', 'Ostalo'])
            ->set('answers.payments', ['Bankovna uplata'])->call('back')->call('next')
            ->assertSet('answers.payments', ['Bankovna uplata'])
            ->assertSet('answers.integrations', ['Dostavne službe', 'Ostalo']);
        Livewire::test(ProjectInquiry::class)->set('service', 'web')->call('next')
            ->set('answers', [...$this->webAnswers(), 'features' => ['Injected option']])->call('next')
            ->assertSet('step', 2)->assertHasErrors('answers.features.0')
            ->assertSeeHtml('id="error-features"')->assertSee('Odaberite ponuđenu vrijednost.')
            ->set('answers.features', ['Blog / novosti', 'Više jezika'])->call('next')->assertHasNoErrors()->assertSet('step', 3);
    }

    public function test_old_scalar_checkbox_draft_is_discarded_without_losing_valid_answers(): void
    {
        Livewire::test(ProjectInquiry::class)->call('restoreDraft', ['service' => 'web', 'answers' => ['existing' => 'Ne', 'features' => true]])
            ->assertSet('answers.features', [])->assertSet('answers.existing', 'Ne');
        Livewire::test(ProjectInquiry::class)->call('restoreDraft', ['service' => 'web', 'answers' => ['features' => ['Blog / novosti', 'Više jezika']]])
            ->assertSet('answers.features', ['Blog / novosti', 'Više jezika']);
    }
}
