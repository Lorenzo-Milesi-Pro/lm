<?php

namespace App\Http\Livewire\Components\Dashboard\Blog;

use App\Models\Blog\Domain;
use App\Models\Blog\Post;
use App\Repositories\PostRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class PostIndex extends Component
{
    public Collection $posts;
    public Collection $domains;
    public ?string $search = null;
    public ?string $domain = null;
    public ?string $status = 'all';

    protected $listeners = ['postStored'];

    protected $queryString = [
        'search' => ['except' => ''],
        'domain' => ['except' => ''],
        'status' => ['except' => 'all']
    ];

    public function mount()
    {
        $this->domains = Domain::orderBy('name')->get();
        $this->fetch();
    }

    public function render(): View
    {
        return view('livewire.components.dashboard.blog.post-index');
    }

    public function postStored()
    {
        $this->fetch();
    }

    public function updated()
    {
        $this->fetch();
    }

    private function fetch(): void
    {
        $this->posts = resolve(PostRepository::class)->index($this->search, $this->domain, $this->status);
    }

    public function edit(int $post)
    {
        $this->emitTo(PostForm::class, 'open', $post);
    }
}
