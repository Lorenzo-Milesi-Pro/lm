<?php

namespace App\Http\Livewire\Components\Site\Sections;

use App\Repositories\PostRepository;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Toolbox extends Component
{
    use WithPagination;

    public function render(): View
    {
        return view('livewire.components.site.sections.toolbox', [
            'postsCount' => resolve(PostRepository::class)->getToolboxPostsCount(),
            'posts' => resolve(PostRepository::class)->getToolboxPosts() ?: collect(),
        ]);
    }
}
