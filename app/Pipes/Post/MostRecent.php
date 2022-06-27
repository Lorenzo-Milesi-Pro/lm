<?php

namespace App\Pipes\Post;

use Closure;

class MostRecent
{
    public function handle($request, Closure $next)
    {
        return $next($request)->orderBy('updated_at', 'DESC');
    }
}
