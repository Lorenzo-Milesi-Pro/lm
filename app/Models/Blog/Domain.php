<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Domain extends Model
{
    use HasFactory, HasSlug;

    protected $table = 'blog_domains';

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'blog_domain_id');
    }

    public function publishedPosts(): Attribute
    {
        return new Attribute(
            get: fn ($value) => $this->posts()
                ->orderBy('updated_at', 'DESC')
                ->whereNotNull('published_at')
                ->paginate()
        );
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
