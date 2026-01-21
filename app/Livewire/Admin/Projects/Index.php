<?php

namespace App\Livewire\Admin\Projects;

use Livewire\Component;
use App\Models\Project;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Index extends Component
{

    use WithFileUploads;



    public $confirmingDelete = false;
    public $deleteProjectId = null;

    public $categories;
    public $tags;

    public $projectId = null;
    public $name = '';
    public $description = '';
    public $category_id = null;
    public $is_featured = false;
    public $link = '';

    public $selectedTags = [];

    public $showModal = false;

    public $images = [];

    public $image;
    public $existingImage = null;

    public function confirmDelete($id)
    {
        $this->deleteProjectId = $id;
        $this->confirmingDelete = true;
    }

    protected function rules()
    {
        return [
            'name' => 'required|min:3',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable',
            'link' => 'nullable|url',
            'image' => 'nullable|image|max:2048',
            'selectedTags' => 'array',
            'selectedTags.*' => 'exists:tags,id',
            'images'   => 'nullable|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:4096',
        ];
    }

    public function mount()
    {
        $this->categories = Category::orderBy('name')->get();
        $this->tags = Tag::orderBy('name')->get();
    }

    public function create()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function edit($id)
    {
        $project = Project::with('tags')->findOrFail($id);

        $this->projectId = $project->id;
        $this->name = $project->name;
        $this->description = $project->description;
        $this->category_id = $project->category_id;
        $this->is_featured = $project->is_featured;
        $this->link = $project->link;
        $this->existingImage = $project->image;

        $this->selectedTags = $project->tags->pluck('id')->toArray();

        $this->image = null;

        $this->showModal = true;
    }

    public function save()
    {

        $this->validate();

        $imagePath = $this->existingImage;

        if ($this->image) {
            $imagePath = $this->image->store('projects', 'public');
        }

        $project = Project::updateOrCreate(
            ['id' => $this->projectId],
            [
                'name' => $this->name,
                'slug' => Str::slug($this->name),
                'description' => $this->description,
                'category_id' => $this->category_id,
                'is_featured' => $this->is_featured,
                'link' => $this->link,
                'image' => $imagePath,
            ]
        );

        // GALERIJA SLIKA
        if (!empty($this->images)) {


            foreach ($this->images as $galleryImage) {

                $path = $galleryImage->store(
                    'projects/' . $project->id . '/gallery',
                    'public'
                );

                $project->images()->create([
                    'path' => $path,

                ]);
            }
        }


        $project->tags()->sync($this->selectedTags);

        $this->showModal = false;
        $this->resetForm();
    }

    public function confirmingDelete($id)
    {
        $this->deleteProjectId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        Project::findOrFail($this->deleteProjectId)->delete();

        $this->confirmingDelete = false;
        $this->deleteProjectId = null;
    }



    private function resetForm()
    {
        $this->reset([
            'projectId',
            'name',
            'description',
            'category_id',
            'is_featured',
            'link',
            'image',
            'existingImage',
            'selectedTags',
            'images',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.projects.index', [
            'projects' => Project::with(['category', 'tags'])->latest()->get(),
        ]);
    }
}
