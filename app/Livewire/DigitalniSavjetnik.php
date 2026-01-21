<?php

namespace App\Livewire;

use App\Services\AiAdvisorService;
use Livewire\Component;

class DigitalniSavjetnik extends Component
{

    public $businessType;
    public $city;
    public $hasWebsite;
    public $budget;
    public $problems = [];
    public $question;

    public $showResult = false;
    public $result;

    protected $rules = [
        'businessType' => 'required',
        'city' => 'required|min:2',
        'hasWebsite' => 'required',
        'budget' => 'required',
        'problems' => 'required|array|min:1',
        'question' => 'required|min:10|max:300',
    ];

    public function submit()
    {
        $this->validate();

        $data = [
            'businessType' => $this->businessType,
            'city' => $this->city,
            'hasWebsite' => $this->hasWebsite,
            'budget' => $this->budget,
            'problems' => $this->problems,
            'question' => $this->question,
        ];

        $this->result = app(AiAdvisorService::class)->getAdvice($data);

        $this->showResult = true;
    }

    public function render()
    {
        return view('livewire.digitalni-savjetnik');
    }
}
