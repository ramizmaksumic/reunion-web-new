<?php

namespace App\Livewire\Admin\Categories;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

use function Livewire\str;

class Index extends Component
{
    public $name;
    public $editingId = null;
    public $showModal = false;
    public $slug;

    protected $rules = [
        'name' => 'required|min:3'
    ];


    public function save()
    {
        $this->validate();

        $slug = Str::slug($this->name);

        Category::updateOrCreate(
            ['id' => $this->editingId],
            [
                'name' => $this->name,
                'slug' => $slug,
            ]
        );

        $this->reset(['name', 'editingId', 'showModal']);
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->editingId = $category->id;
        $this->name = $category->name;
        $this->showModal = true;
    }

    public function delete($id)
    {
        $category = Category::withCount('projects')->findOrFail($id);

        if ($category->projects_count > 0) {
            $this->addError(
                'delete',
                'Ne možete obrisati kategoriju koja ima projekte.'
            );
            return;
        }

        $category->delete();
    }


    public function render()
    {
        return view('livewire.admin.categories.index', [
            'categories' => Category::latest()->get()
        ]);
    }
}
