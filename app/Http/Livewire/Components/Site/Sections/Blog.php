<?php

namespace App\Http\Livewire\Components\Site\Sections;

use App\Models\Blog\Domain;
use App\Repositories\PostRepository;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Blog extends Component
{
    use WithPagination;

    public ?string $d = null;

    protected $queryString = [
        'd' => ['except' => ''],
    ];

    public function render(): View
    {
        return view('livewire.components.site.sections.blog', [
            'domains' => Domain::orderBy('name')->where('slug', '<>', 'toolbox')->get(),
            'postsCount' => resolve(PostRepository::class)->getPublishedPostsCount(),
            'posts' => resolve(PostRepository::class)->getPosts($this->d)->withQueryString() ?: collect(),
        ]);
    }
}
