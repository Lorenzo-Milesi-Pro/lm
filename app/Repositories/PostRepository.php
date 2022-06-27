<?php

namespace App\Repositories;

use App\Http\Livewire\Components\Site\Sections\Posts;
use App\Models\Blog\Domain;
use App\Models\Blog\Post;
use App\Pipes\Post\Active;
use App\Pipes\Post\ExceptToolbox;
use App\Pipes\Post\MostRecent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pipeline\Pipeline;

class PostRepository
{
    public function search(?string $search): LengthAwarePaginator
    {
        return Post::query()
            ->whereNotNull('published_at')
            ->where(function ($query) use ($search) {
                $query->where('title', 'like', "%$search%")
                    ->orWhere('excerpt', 'like', "%$search%")
                    ->orWhere('content', 'like', "%$search%");
            })
            ->paginate();
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

        return $query->paginate();
    }

    public function getPublishedPostsCount(): int
    {
        return app(Pipeline::class)
            ->send(Post::query())
            ->through([ ExceptToolbox::class, Active::class, MostRecent::class ])
            ->thenReturn()
            ->count();
    }

    public function getPosts(?string $domain = null): LengthAwarePaginator|null
    {
        if($domain) {
            return Domain::whereSlug($domain)?->first()?->published_posts;
        }

        return app(Pipeline::class)
            ->send(Post::query())
            ->through([ ExceptToolbox::class, Active::class, MostRecent::class ])
            ->thenReturn()
            ->paginate();
    }

    public function getToolboxPosts(): LengthAwarePaginator|null
    {
        return Domain::whereSlug('toolbox')?->first()?->published_posts;
    }

    public function getPublishedToolboxPostsCount(): int
    {
        $count = Domain::whereSlug('toolbox')?->first()?->published_posts->count();

        return $count ?: 0;
    }
}
