<?php

namespace App\Livewire\Admin\Posts;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;

class Index extends Component
{
    use WithFileUploads;

    public $posts;
    public $categories;

    // form fields
    public $postId = null;
    public $title = '';
    public $slug = '';
    public $body = '';
    public $category_id = null;
    public $image;
    public $banner;
    public $tags;
    public $tagIds = [];

    // ui state
    public $showModal = false;
    public $confirmingDelete = false;
    public $deleteId = null;

    protected $rules = [
        'title' => 'required|string|max:255',
        'body' => 'required|string',
        'category_id' => 'nullable|exists:categories,id',
        'image' => 'nullable|image|max:2048',
        'banner' => 'nullable|image|max:4096',
    ];

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->posts = Post::with(['category', 'tags'])
            ->latest()
            ->get();

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
        $post = Post::with('tags')->findOrFail($id);

        $this->tagIds = $post->tags->pluck('id')->toArray();


        $this->postId = $post->id;
        $this->title = $post->title;
        $this->slug = $post->slug;
        $this->body = $post->body;
        $this->category_id = $post->category_id;

        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        $slug = $this->slug
            ? $this->generateUniqueSlug($this->slug, $this->postId)
            : $this->generateUniqueSlug($this->title, $this->postId);


        $data = [
            'title' => $this->title,
            'slug' => $slug,
            'body' => $this->body,
            'category_id' => $this->category_id,
        ];

        if ($this->image) {
            $data['image'] = $this->image->store('posts', 'public');
        }

        if ($this->banner) {
            $data['banner'] = $this->banner->store('posts/banners', 'public');
        }

        $post = Post::updateOrCreate(
            ['id' => $this->postId],
            $data
        );

        if (property_exists($this, 'tagIds')) {
            $post->tags()->sync($this->tagIds);
        }

        $this->showModal = false;
        $this->resetForm();
        $this->loadData();
    }

    private function generateUniqueSlug($title, $ignoreId = null)
    {
        $slug = Str::slug($title);
        $original = $slug;
        $counter = 1;

        while (
            Post::where('slug', $slug)
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
        Post::findOrFail($this->deleteId)->delete();

        $this->confirmingDelete = false;
        $this->deleteId = null;
        $this->loadData();
    }

    private function resetForm()
    {
        $this->reset([
            'postId',
            'title',
            'slug',
            'body',
            'category_id',
            'image',
            'banner',
            'tagIds',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.posts.index');
    }
}
