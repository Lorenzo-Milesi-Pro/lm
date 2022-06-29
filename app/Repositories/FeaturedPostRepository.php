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

    public function getLastUpdatedPost(): ?Post
    {
       $lastUpatedPosts = app(Pipeline::class)
            ->send(Post::query())
            ->through([ Active::class, MostRecent::class ])
            ->thenReturn()
            ->get();

       return $lastUpatedPosts->first();
    }

    public function getMostRecentPost(): ?Post
    {
        $posts = app(Pipeline::class)
            ->send(Post::query())
            ->through([ Active::class, MostRecent::class ])
            ->thenReturn()
            ->take(3)
            ->get();

        if ($posts?->first()?->slug === $this->getMostViewedPost()?->slug) {

            if(isset($posts[1]) && $posts[1]?->slug === $this->getMostRecentlyViewedPost()?->slug) {
                return $posts[2] ?? null;
            }
 
            return $posts[1] ?? null;
        }


        return $posts->first();
    }
}
