<?php

namespace App\Livewire\Admin\Tags;

use Livewire\Component;
use App\Models\Tag;
use Illuminate\Support\Str;

class Index extends Component
{
    public $tags;

    public $tagId = null;
    public $name = '';
    public $slug = '';

    public $showModal = false;
    public $confirmingDelete = false;
    public $deleteId = null;

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->tags = Tag::orderBy('name')->get();
    }

    public function create()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);

        $this->tagId = $tag->id;
        $this->name = $tag->name;
        $this->slug = $tag->slug;

        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        $slug = $this->slug
            ? $this->generateUniqueSlug($this->slug, $this->tagId)
            : $this->generateUniqueSlug($this->name, $this->tagId);

        Tag::updateOrCreate(
            ['id' => $this->tagId],
            [
                'name' => $this->name,
                'slug' => $slug,
            ]
        );

        $this->showModal = false;
        $this->resetForm();
        $this->loadData();
    }

    private function generateUniqueSlug($value, $ignoreId = null)
    {
        $slug = Str::slug($value);
        $original = $slug;
        $counter = 1;

        while (
            Tag::where('slug', $slug)
            ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
            ->exists()
        ) {
            $slug = $original . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        Tag::findOrFail($this->deleteId)->delete();

        $this->confirmingDelete = false;
        $this->deleteId = null;
        $this->loadData();
    }

    private function resetForm()
    {
        $this->reset([
            'tagId',
            'name',
            'slug',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.tags.index');
    }
}
