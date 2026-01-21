<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class Portfolio extends Component
{
    use WithPagination;


    public string $activeCategory = 'all';

    public function setCategory(string $slug)
    {
        $this->activeCategory = $slug;
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.portfolio', [
            'categories' => Category::all(),
            'projects' => Project::query()
                ->when($this->activeCategory !== 'all', function ($q) {
                    $q->whereHas(
                        'category',
                        fn($q) =>
                        $q->where('slug', $this->activeCategory)
                    );
                })
                ->paginate(9),
        ])->extends('portfolio')->section('div');
    }
}
