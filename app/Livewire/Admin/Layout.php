<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Layout extends Component
{
    public string $activeSection = 'dashboard';
    protected $listeners = ['navigate' => 'setSection',];

    public function setSection(string $section)
    {
        $this->activeSection = $section;
    }
    public function render()
    {



        return view('livewire.admin.layout')->layout('layouts.admin');
    }
}
