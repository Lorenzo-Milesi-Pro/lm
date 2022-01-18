<?php

namespace App\Http\Livewire\Components\Site\Search;

use App\Repositories\PostRepository;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class MatchingPosts extends Component
{
    use WithPagination;

    public ?string $search = null;

    public function render(): View
    {
        return view('livewire.components.site.search.matching-posts', [
            'posts' => resolve(PostRepository::class)->search($this->search)->withQueryString(),
        ]);
    }
}
