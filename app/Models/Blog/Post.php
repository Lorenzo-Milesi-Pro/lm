<?php

namespace App\Models\Blog;

use App\Helpers\Blogging;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
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

    protected function htmlContent(): Attribute
    {
        $blocks = explode('```', $this->content);

        foreach($blocks as $k => $block) {
            if($k % 2) {
                $language = !empty(Str::before($block, PHP_EOL))
                    ? Str::before($block, PHP_EOL)
                    : 'bash';
                $blocks[$k] = [
                    'language' => $language,
                    'content' => Str::after($block, PHP_EOL)
                ];
            }
        }

        return new Attribute(
            get: fn () => $blocks
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

    public function next(): HasOne
    {
        return $this->hasOne(Post::class, 'parent_id');
    }

    public function previous(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'parent_id');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
