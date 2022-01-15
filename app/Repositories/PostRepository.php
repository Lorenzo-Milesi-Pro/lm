<?php

namespace App\Repositories;

use App\Models\Blog\Post;
use Illuminate\Database\Eloquent\Collection;

class PostRepository
{
    public function index(?string $search, ?string $domain, ?string $status): Collection
    {
        $query = Post::orderBy('updated_at', 'DESC')
            ->where('title', 'like', "%$search%");

        if($domain) {
            $query->where('blog_domain_id', $domain);
        }

        switch ($status) {
            case 'active':
                $query->whereNotNull('published_at');
                break;
            case 'hidden':
                $query->whereNull('published_at');
                break;
            default:
                break;
        }

        return $query->get();
    }
}
