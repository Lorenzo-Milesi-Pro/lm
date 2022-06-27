<?php

namespace App\Pipes\Post;

use Closure;

class Active
{
    public function handle($request, Closure $next)
    {
        return $next($request)->whereNotNull('published_at');
    }
}
