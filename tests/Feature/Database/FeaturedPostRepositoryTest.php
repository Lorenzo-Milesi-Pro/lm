<?php

use App\Models\Blog\Post;
use App\Repositories\FeaturedPostRepository;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('most viewed : it returns the most viewed post', function () {
    Post::factory()->create(['slug' => 'one', 'published_at' => now(), 'views' => 323]);
    Post::factory()->create(['slug' => 'two', 'published_at' => now(), 'views' => 120]);
    $post = app(FeaturedPostRepository::class)->getMostViewedPost();
    $this->assertEquals('one', $post->slug);
});

test('most viewed : when two posts have the same number of views, return the last viewed', function () {
    Post::factory()->create(['slug' => 'one', 'published_at' => now(), 'views' => 323, 'viewed_at' => Carbon::now()->subDay()]);
    Post::factory()->create(['slug' => 'two', 'published_at' => now(), 'views' => 323, 'viewed_at' => Carbon::now()]);
    $post = app(FeaturedPostRepository::class)->getMostViewedPost();
    $this->assertEquals('two', $post->slug);
});

test('most viewed : it returns null if there\'s no posts', function () {
    $this->assertNull(app(FeaturedPostRepository::class)->getMostViewedPost());
});

test('most recenlty viewed : it returns the most recently viewed post', function () {
    Post::factory()->create(['slug' => 'one', 'published_at' => now(), 'views' => 323, 'viewed_at' => Carbon::now()->subDay()]);
    Post::factory()->create(['slug' => 'two', 'published_at' => now(), 'views' => 129, 'viewed_at' => Carbon::now()]);
    $post = app(FeaturedPostRepository::class)->getMostRecentlyViewedPost();
    $this->assertEquals('two', $post->slug);
});

test('most recenlty viewed : it returns the most recently viewed post except if it\'s the most viewed post', function () {
    Post::factory()->create(['slug' => 'one', 'published_at' => now(), 'views' => 129, 'viewed_at' => Carbon::now()->subDay()]);
    Post::factory()->create(['slug' => 'two', 'published_at' => now(), 'views' => 323, 'viewed_at' => Carbon::now()]);
    $post = app(FeaturedPostRepository::class)->getMostRecentlyViewedPost();
    $this->assertEquals('one', $post->slug);
});

test('most recenlty viewed : it returns null if the only most recently viewed post is the most viewed post', function () {
    Post::factory()->create(['slug' => 'one', 'published_at' => now(), 'views' => 129, 'viewed_at' => Carbon::now()->subDay()]);
    $this->assertNull(app(FeaturedPostRepository::class)->getMostRecentlyViewedPost());
});

test('most recenlty viewed : it returns null if there\'s no posts', function () {
    $this->assertNull(app(FeaturedPostRepository::class)->getMostRecentlyViewedPost());
});

test('most recent : it returns the most recent post', function () {
    Post::factory()->create(['slug' => 'one', 'published_at' => now(), 'views' => 2, 'viewed_at' => Carbon::now()->subDay(), 'updated_at' => Carbon::now()]);
    Post::factory()->create(['slug' => 'two', 'published_at' => now(), 'views' => 129, 'viewed_at' => Carbon::now(), 'updated_at' => Carbon::now()->subDay()]);
    $post = app(FeaturedPostRepository::class)->getMostRecentPost();
    $this->assertEquals('one', $post->slug);
});

test('most recent : it returns the 2nd most recent post if the 1st one is the most viewed post', function () {
    Post::factory()->create(['slug' => 'one', 'published_at' => now(), 'views' => 219, 'viewed_at' => Carbon::now()->subDay(), 'updated_at' => Carbon::now()]);
    Post::factory()->create(['slug' => 'two', 'published_at' => now(), 'views' => 129, 'viewed_at' => Carbon::now()->subDays(2), 'updated_at' => Carbon::now()->subDay()]);
    Post::factory()->create(['slug' => 'three', 'published_at' => now(), 'views' => 129, 'viewed_at' => Carbon::now(), 'updated_at' => Carbon::now()->subDay()]);
    $post = app(FeaturedPostRepository::class)->getMostRecentPost();
    $this->assertEquals('two', $post->slug);
});

test('most recent : it returns the 3rd most recent post if the 1st one is the most viewed post and the 2nd one is the most recently viewed post', function () {
    Post::factory()->create(['slug' => 'one', 'published_at' => now(), 'views' => 219, 'viewed_at' => Carbon::now()->subDay(), 'updated_at' => Carbon::now()]);
    Post::factory()->create(['slug' => 'two', 'published_at' => now(), 'views' => 129, 'viewed_at' => Carbon::now(), 'updated_at' => Carbon::now()->subDay()]);
    Post::factory()->create(['slug' => 'three', 'published_at' => now(), 'views' => 12, 'viewed_at' => Carbon::now(), 'updated_at' => Carbon::now()->subDays(2)]);
    $post = app(FeaturedPostRepository::class)->getMostRecentPost();
    $this->assertEquals('three', $post->slug);
});

test('most recent : it returns null if there is less than 2 posts', function () {
    $this->assertNull(app(FeaturedPostRepository::class)->getMostRecentPost());
    Post::factory()->create(['slug' => 'one', 'published_at' => now(), 'views' => 219, 'viewed_at' => Carbon::now()->subDay(), 'updated_at' => Carbon::now()]);
    $this->assertNull(app(FeaturedPostRepository::class)->getMostRecentPost());
    Post::factory()->create(['slug' => 'two', 'published_at' => now(), 'views' => 219, 'viewed_at' => Carbon::now()->subDay(), 'updated_at' => Carbon::now()]);
    $this->assertNull(app(FeaturedPostRepository::class)->getMostRecentPost());
});
