<?php

use App\Models\Blog\Post;
use App\Repositories\FeaturedPostRepository;
use App\Repositories\PostRepository;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('most viewed : it returns the most viewed post', function () {
    Post::factory()->create([ 'slug' => 'one', 'published_at' => now(), 'views' => 323 ]);
    Post::factory()->create([ 'slug' => 'two', 'published_at' => now(), 'views' => 120 ]);
    $post = app(FeaturedPostRepository::class)->getMostViewedPost();
    $this->assertEquals('one', $post->slug);
});

test('most viewed : when two posts have the same number of views, return the last viewed', function () {
    Post::factory()->create([ 'slug' => 'one', 'published_at' => now(), 'views' => 323, 'viewed_at' => Carbon::now()->subDay() ]);
    Post::factory()->create([ 'slug' => 'two', 'published_at' => now(), 'views' => 323, 'viewed_at' => Carbon::now() ]);
    $post = app(FeaturedPostRepository::class)->getMostViewedPost();
    $this->assertEquals('two', $post->slug);
});

test('most viewed : it returns null if there\'s no posts', function () {
    $this->assertNull(app(FeaturedPostRepository::class)->getMostViewedPost());
});

test('most recenlty viewed : it returns the most recently viewed post', function () {
    Post::factory()->create([ 'slug' => 'one', 'published_at' => now(), 'views' => 323, 'viewed_at' => Carbon::now()->subDay() ]);
    Post::factory()->create([ 'slug' => 'two', 'published_at' => now(), 'views' => 129, 'viewed_at' => Carbon::now() ]);
    $post = app(FeaturedPostRepository::class)->getMostRecentlyViewedPost();
    $this->assertEquals('two', $post->slug);
});

test('most recenlty viewed : it returns the most recently viewed post except if it\'s the most viewed post', function () {
    Post::factory()->create([ 'slug' => 'one', 'published_at' => now(), 'views' => 129, 'viewed_at' => Carbon::now()->subDay() ]);
    Post::factory()->create([ 'slug' => 'two', 'published_at' => now(), 'views' => 323, 'viewed_at' => Carbon::now() ]);
    $post = app(FeaturedPostRepository::class)->getMostRecentlyViewedPost();
    $this->assertEquals('one', $post->slug);
});

test('most recenlty viewed : it returns null if the only most recently viewed post is the most viewed post', function () {
    Post::factory()->create([ 'slug' => 'one', 'published_at' => now(), 'views' => 129, 'viewed_at' => Carbon::now()->subDay() ]);
    $this->assertNull(app(FeaturedPostRepository::class)->getMostRecentlyViewedPost());
});

test('most recenlty viewed : it returns null if there\'s no posts', function () {
    $this->assertNull(app(FeaturedPostRepository::class)->getMostRecentlyViewedPost());
});

