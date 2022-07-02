<?php

namespace App\Models\Blog;

use App\Helpers\Blogging;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    use HasFactory, HasSlug;

    protected $guarded = [];

    protected $table = 'blog_posts';

    protected function cover(): Attribute
    {
        return new Attribute(
            get: fn ($value) => asset('storage/'.$value)
        );
    }

    protected function hasCover(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  (bool) Str::after($this->cover, 'storage'),
        );
    }

    protected function readingTime(): Attribute
    {
        $estimatedReadingTime = Blogging::estimateReadingTime($this->content ?? '');

        return new Attribute(
            get: fn () => "$estimatedReadingTime->minutes m $estimatedReadingTime->seconds s"
        );
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function blog_domain(): BelongsTo
    {
        return $this->belongsTo(Domain::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
