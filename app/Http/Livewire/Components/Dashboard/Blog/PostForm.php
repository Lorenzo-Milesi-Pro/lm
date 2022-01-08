<?php

namespace App\Http\Livewire\Components\Dashboard\Blog;

use App\Models\Blog\Domain;
use App\Models\Blog\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostForm extends Component
{
    use WithFileUploads;

    public bool $show = false;
    public Collection $domains;
    public Post $post;
    public bool $write = true;

    protected $listeners = ['open'];

    protected $rules = [
        'post.title' => 'required|unique:blog_posts,title|string|max:255',
        'post.cover' => 'nullable|image',
        'post.excerpt' => 'nullable|string|max:255',
        'post.content' => 'nullable',
        'post.blog_domain_id' => 'required|numeric|exists:blog_domains,id',
        'post.published_at' => 'nullable'
    ];

    public function open()
    {
        $this->show = true;
    }

    public function close()
    {
        $this->show = false;
    }

    public function render(): View
    {
        return view('livewire.components.dashboard.blog.post-form');
    }

    public function mount()
    {
        $this->domains = Domain::orderBy('name')->get();
        $this->post = new Post();
    }

    public function store()
    {
        $this->validate();
        $this->post->save();
    }
}
