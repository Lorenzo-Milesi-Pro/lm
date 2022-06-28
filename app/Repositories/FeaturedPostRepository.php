<?php

namespace App\Repositories;

use App\Models\Blog\Post;
use App\Pipes\Post\Active;
use App\Pipes\Post\ExceptToolbox;
use App\Pipes\Post\MostRecent;
use Illuminate\Pipeline\Pipeline;

class FeaturedPostRepository
{
    public function getFeaturedPost(): Post
    {
        return Post::latest()->first();
    }
}
