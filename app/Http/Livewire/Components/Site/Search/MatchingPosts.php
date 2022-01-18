<?php

namespace App\Http\Livewire\Components\Site\Search;

use App\Http\Livewire\Behaviours\WithSearchBehaviour;
use App\Http\Livewire\Components\Site\Sections\Posts;
use App\Repositories\PostRepository;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class MatchingPosts extends Component
{
    use WithSearchBehaviour;

    public function render(): View
    {
        return view('livewire.components.site.search.matching-posts', [
            'posts' => resolve(PostRepository::class)->search(request()->get('search')),
        ]);
    }
}
