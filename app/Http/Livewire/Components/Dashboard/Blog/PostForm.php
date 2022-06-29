<?php

namespace App\Http\Livewire\Components\Dashboard\Blog;

use App\Http\Livewire\Behaviours\WithModalBehaviour;
use App\Models\Blog\Domain;
use App\Models\Blog\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostForm extends Component
{
    use WithFileUploads, WithModalBehaviour;

    public ?Post $post = null;

    public Collection $domains;

    public bool $write = true;

    public string $title = '';

    public $cover;

    public ?string $tempCover = null;

    public ?string $excerpt = null;

    public ?string $content = null;

    public ?int $domain = null;

    public bool $publish = false;

    public bool $hasPreview = false;

    protected $listeners = ['open', 'close', 'domainStoreEvent'];

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
        if (is_array($this->cover)) {
            $this->cover = Arr::last($this->cover);
        }

        $this->validate($this->validationRules());

        $this->post->title = $this->title;
        $this->post->cover = $this->storeCoverAndGetPath();
        $this->post->excerpt = $this->excerpt;
        $this->post->content = $this->content;
        $this->post->blog_domain_id = $this->domain;
        $this->post->published_at = $this->publish ? now() : null;
        if ($this->hasPreview) {
            $this->post->preview = is_null($this->post->preview) ? Str::uuid() : $this->post->preview;
        } else {
            $this->post->preview = null;
        }
        $this->post->save();

        $this->emit('postStored');
    }

    public function storeAndClose(): void
    {
        $this->store();
        $this->close();
    }

    public function domainStoreEvent()
    {
        $this->domains = Domain::orderBy('name')->get();
    }

    public function updatedCover()
    {
        if (is_array($this->cover)) {
            $this->tempCover = Arr::last($this->cover)->temporaryUrl();
        } else {
            $this->tempCover = $this->cover->temporaryUrl();
        }
    }

    private function storeCoverAndGetPath(): string|null
    {
        if (is_string($this->cover)) {
            return Str::after($this->cover, 'storage/');
        }

        $path = $this->cover?->store('public/blog');

        return is_null($path) ? null : Str::after($path, 'public/');
    }

    public function open(?int $post = null)
    {
        $this->post = $post ? Post::find($post) : new Post();
        $this->title = $this->post->title ?? '';
        $this->cover = $this->post->cover;
        $this->tempCover = $this->cover;
        $this->excerpt = $this->post->excerpt;
        $this->content = $this->post->content;
        $this->domain = $this->post->blog_domain_id;
        $this->publish = ! is_null($this->post->published_at);
        $this->hasPreview = ! is_null($this->post->preview);
        $this->show = true;
    }

    private function validationRules(): array
    {
        $uniqueRule = $this->post->id ? 'unique:blog_posts,title,'.$this->post->id : 'unique:blog_posts,title';

        return [
            'title' => "required|$uniqueRule|string|max:255",
            'cover' => 'nullable|max:2048',
            'excerpt' => 'nullable|string|max:255',
            'content' => 'nullable',
            'domain' => 'required|numeric|exists:blog_domains,id',
            'publish' => 'nullable',
        ];
    }
}
