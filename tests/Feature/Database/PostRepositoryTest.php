<?php

use App\Models\Blog\Domain;
use App\Models\Blog\Post;
use App\Repositories\PostRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('gets paginated posts', function () {
    Post::factory(16)->create(['published_at' => now()]);
    $this->assertEquals(15, app(PostRepository::class)->getPosts()->count());
});

it('gets published posts', function () {
    $unpublished = Post::factory()->create();
    $published = Post::factory()->create(['published_at' => now()]);
    $result = app(PostRepository::class)->getPosts()->toJson();

    $this->assertStringContainsString($published->title, $result);
    $this->assertStringNotContainsString($unpublished->title, $result);
});

it('gets published posts exept for toolbox posts', function () {
    $post = Post::factory()->create(['published_at' => now()]);
    $tool = Post::factory()->create([
        'blog_domain_id' => Domain::factory()->create(['name' => 'Toolbox', 'slug' => 'toolbox'])->id,
        'published_at' => now(),
    ]);
    $result = app(PostRepository::class)->getPosts()->toJson();

    $this->assertStringContainsString($post->title, $result);
    $this->assertStringNotContainsString($tool->title, $result);
});

it('counts published posts', function () {
    $post = Post::factory()->create(['published_at' => now()]);
    $unpublished = Post::factory()->create();

    $this->assertEquals(1, app(PostRepository::class)->getPublishedPostsCount());
});

it('counts published posts except for toolbox articles', function () {
    $post = Post::factory()->create(['published_at' => now()]);
    $tool = Post::factory()->create([
        'blog_domain_id' => Domain::factory()->create(['name' => 'Toolbox', 'slug' => 'toolbox'])->id,
        'published_at' => now(),
    ]);

    $this->assertEquals(1, app(PostRepository::class)->getPublishedPostsCount());
});


