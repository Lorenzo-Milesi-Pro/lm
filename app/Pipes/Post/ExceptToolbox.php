<?php

namespace App\Pipes\Post;

use App\Models\Blog\Domain;
use Closure;

class ExceptToolbox
{
    public function handle($request, Closure $next)
    {
        $toolbox = Domain::whereSlug('toolbox')->first();

        if(! $toolbox) {
            return $next($request);
        }

        return $next($request)->where('blog_domain_id', '<>', $toolbox->id);
    }
}
