<?php

namespace App\Http\Livewire\Components\Site\Sections;

use App\Repositories\FeaturedPostRepository;
use Illuminate\View\View;
use Livewire\Component;

class FeaturedPosts extends Component
{
    public function render(): View
    {
        $show = false;
        $mostViewedPost = app(FeaturedPostRepository::class)->getMostViewedPost();
        $mostRecentlyViewedPost = app(FeaturedPostRepository::class)->getMostRecentlyViewedPost();
        $latestPost = app(FeaturedPostRepository::class)->getMostRecentPost();
        if ($mostViewedPost && $mostRecentlyViewedPost && $latestPost) {
            $show = true;
        }

        return view(
            'livewire.components.site.sections.featured-posts',
            compact('show', 'mostViewedPost', 'mostRecentlyViewedPost', 'latestPost')
        );
    }
}
