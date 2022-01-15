<?php

namespace App\Http\Livewire\Components\Dashboard\Blog;

use App\Models\Blog\Domain;
use App\Models\Blog\Post;
use Arr;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;
use Str;

class PostForm extends Component
{
    use WithFileUploads;

    public bool $show = false;
    public Collection $domains;
    public bool $write = true;

    public string $title = '';
    public $cover;
    public ?string $excerpt = null;
    public ?string $content = null;
    public ?int $domain = null;
    public bool $publish = false;

    protected $listeners = ['open', 'close', 'domainStoreEvent'];

    protected $rules = [
        'title' => 'required|unique:blog_posts,title|string|max:255',
        'cover' => 'nullable|image|max:2048',
        'excerpt' => 'nullable|string|max:255',
        'content' => 'nullable',
        'domain' => 'required|numeric|exists:blog_domains,id',
        'publish' => 'nullable'
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
    }

    public function store(): void
    {
        if(is_array($this->cover)) {
            $this->cover = Arr::last($this->cover);
        }

        $this->validate();

        $post = new Post();
        $post->title = $this->title;
        $post->cover = $this->storeCoverAndGetPath();
        $post->excerpt = $this->excerpt;
        $post->content = $this->content;
        $post->blog_domain_id = $this->domain;
        $post->published_at = $this->publish ? now() : null;
        $post->save();

        $this->emit('postCreated');
        $this->close();
    }

    public function domainStoreEvent()
    {
        $this->domains = Domain::orderBy('name')->get();
    }

    private function storeCoverAndGetPath(): string|null
    {
        $path = $this->cover?->store('public/blog');
        return is_null($path) ? null : Str::after($path, 'public/');
    }
}
