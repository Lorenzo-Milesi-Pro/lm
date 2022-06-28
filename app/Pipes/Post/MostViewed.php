<?php

namespace App\Pipes\Post;

use Closure;

class MostViewed
{
    public function handle($request, Closure $next)
    {
        return $next($request)->orderBy('views', 'DESC');
    }
}
