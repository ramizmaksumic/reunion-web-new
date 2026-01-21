<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TeamMember extends Component
{
    public $name;
    public $position;
    public function __construct($name, $position)
    {
        $this->name = $name;
        $this->position = $position;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.team-member');
    }
}
