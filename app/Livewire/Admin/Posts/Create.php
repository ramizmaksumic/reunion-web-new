<?php

namespace App\Livewire\Admin\Posts;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;

class Create extends Component
{
    use WithFileUploads;

    public $title = '';
    public $body = '';
    public $slug = '';
    public $category_id = '';
    public $tagIds = [];
    public $image;
    public $banner;



    public function mount()
    {
        $this->dispatch('init-editor');
    }

    public function updatedTitle()
    {
        $this->slug = Str::slug($this->title);
    }

    public function save()
    {


        $this->validate([
            'title' => 'required|min:3',
            'body' => 'required',
        ]);

        $imagePath = $this->image ? $this->image->store('posts', 'public') : null;
        $bannerPath = $this->banner ? $this->banner->store('posts', 'public') : null;

        $post = Post::create([
            'title' => $this->title,
            'slug' => $this->slug,
            'body' => $this->body,
            'category_id' => $this->category_id ?: null,
            'image' => $imagePath,
            'banner' => $bannerPath,
        ]);

        $post->tags()->sync($this->tagIds);

        session()->flash('success', 'Post kreiran');

        $this->dispatch('navigate', section: 'posts'); // nazad na listu

        return redirect()->route('admin');
    }

    public function render()
    {
        return view('livewire.admin.posts.create', [
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ])->layout('layouts.admin-panel');
    }
}
