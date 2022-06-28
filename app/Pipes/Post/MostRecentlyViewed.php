<?php

namespace App\Pipes\Post;

use Closure;

class MostRecentlyViewed
{
    public function handle($request, Closure $next)
    {
        return $next($request)->orderBy('viewed_at', 'DESC');
    }
}
