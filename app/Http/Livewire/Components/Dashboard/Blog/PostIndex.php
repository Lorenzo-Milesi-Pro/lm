<?php

namespace App\Http\Livewire\Components\Dashboard\Blog;

use App\Models\Blog\Domain;
use App\Repositories\PostRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class PostIndex extends Component
{
    use WithPagination;

    public Collection $domains;

    public ?string $search = null;

    public ?string $domain = null;

    public ?string $status = 'all';

    protected $listeners = ['postStored'];

    protected $queryString = [
        'search' => ['except' => ''],
        'domain' => ['except' => ''],
        'status' => ['except' => 'all'],
    ];

    public function mount()
    {
        $this->domains = Domain::orderBy('name')->get();
        $this->fetch();
    }

    public function render(): View
    {
        return view('livewire.components.dashboard.blog.post-index', [
            'posts' => $this->fetch(),
        ]);
    }

    public function postStored()
    {
        $this->fetch();
    }

    public function updated()
    {
        $this->fetch();
    }

    private function fetch(): LengthAwarePaginator
    {
        return resolve(PostRepository::class)
             ->index($this->search, $this->domain, $this->status)
             ->withQueryString();
    }

    public function edit(int $post)
    {
        $this->emitTo(PostForm::class, 'open', $post);
    }

    public function addChapter(int $post)
    {
        $this->emitTo(PostForm::class, 'newChapter', $post);
    }

    public function content(int $post, ?int $content = null)
    {
        $this->emitTo(ContentForm::class, 'open', $post, $content);
    }
}
