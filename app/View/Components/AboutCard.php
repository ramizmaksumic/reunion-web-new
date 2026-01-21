<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AboutCard extends Component
{
    public $title;
    public $text;

    public $icon;


    public function __construct($title, $text, $icon)
    {
        $this->title = $title;
        $this->text = $text;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.about-card');
    }
}
