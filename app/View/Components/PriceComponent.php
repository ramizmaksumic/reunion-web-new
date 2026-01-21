<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PriceComponent extends Component
{
    public $service;
    public $price;
    public function __construct($service, $price)
    {
        $this->service = $service;
        $this->price = $price;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.price-component');
    }
}
