<?php

namespace App\Http\Livewire\Components\Site\Sections;

use App\Models\Blog\Domain;
use App\Models\Blog\Post;
use App\Repositories\PostRepository;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Blog extends Component
{
    public ?string $d = null;

    protected $queryString = [
        'd' => ['except' => ''],
    ];

    public function render(): View
    {
        return view('livewire.components.site.sections.blog', [
            'domains' => Domain::orderBy('name')->get(),
            'postsCount' => resolve(PostRepository::class)->getPublishedPostsCount(),
            'posts' => resolve(PostRepository::class)->getPosts($this->d) ?: collect()
        ]);
    }
}
