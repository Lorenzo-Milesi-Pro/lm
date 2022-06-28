<?php

namespace App\Repositories;

use App\Models\Blog\Post;
use App\Pipes\Post\Active;
use App\Pipes\Post\ExceptToolbox;
use App\Pipes\Post\MostRecent;
use App\Pipes\Post\MostViewed;
use App\Pipes\Post\MostRecentlyViewed;
use Illuminate\Pipeline\Pipeline;

class FeaturedPostRepository
{
    public function getMostViewedPost(): ?Post
    {
        return app(Pipeline::class)
            ->send(Post::query())
            ->through([ Active::class, MostRecent::class, MostRecentlyViewed::class, MostViewed::class ])
            ->thenReturn()
            ->first();
    }

    public function getMostRecentlyViewedPost(): ?Post
    {
       $mostRecenltyViewedPosts = app(Pipeline::class)
            ->send(Post::query())
            ->through([ Active::class, MostRecentlyViewed::class ])
            ->thenReturn()
            ->get();

       if($mostRecenltyViewedPosts?->first()?->slug === $this->getMostViewedPost()?->slug) {
             return $mostRecenltyViewedPosts[1] ?? null;
       }

       return $mostRecenltyViewedPosts->first();
    }


    public function getFeaturedPost(): Post
    {
        return Post::latest()->first();
    }
}
