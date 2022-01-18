<?php

namespace App\Repositories;

use App\Http\Livewire\Components\Site\Sections\Posts;
use App\Models\Blog\Domain;
use App\Models\Blog\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PostRepository
{
    public function search(?string $search): Collection
    {
        return Post::query()
            ->whereNotNull('published_at')
            ->where(function ($query) use ($search) {
                $query->where('title', 'like', "%$search%")
                    ->orWhere('excerpt', 'like', "%$search%")
                    ->orWhere('content', 'like', "%$search%");
            })
            ->get();
    }

    public function index(?string $search, ?string $domain, ?string $status): LengthAwarePaginator
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

        return $query->paginate(3);
    }

    public function getPublishedPostsCount(): int
    {
        return Post::whereNotNull('published_at')->orderBy('updated_at', 'DESC')->count();
    }

    public function getPosts(?string $domain): Collection|null
    {
        if($domain) {
            return Domain::whereSlug($domain)?->first()?->published_posts;
        }

        return Post::whereNotNull('published_at')->orderBy('updated_at', 'DESC')->get();
    }
}
