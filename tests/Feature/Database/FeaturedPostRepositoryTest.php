<?php

use App\Models\Blog\Post;
use App\Repositories\FeaturedPostRepository;
use App\Repositories\PostRepository;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('returns latest post if equals number of views', function () {
    $theDayBefore = Carbon::now()->subDay();

    $notFeatured = Post::factory()->create([
        'published_at' => now(),
        'views' => 2,
        'updated_at' => $theDayBefore,
        'created_at' => $theDayBefore,
    ]);

    $featured = Post::factory()->create([
        'published_at' => now(),
        'views' => 2,
    ]);

    $result = app(FeaturedPostRepository::class)->getFeaturedPost();

    $this->assertEquals($featured->slug, $result->slug);
});
