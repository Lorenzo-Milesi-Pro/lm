<?php

use App\Models\Blog\Domain;
use App\Models\Blog\Post;
use App\Repositories\PostRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

// Search
it('does not search for unpublished posts', function () {
    Post::factory()->create(['title' => 'Hello darkness my old friend']);
    $this->assertCount(0, app(PostRepository::class)->search('Hello'));
});

it('searches on title', function () {
    Post::factory()->create(['title' => 'Hello darkness my old friend', 'published_at' => now()]);
    $this->assertCount(1, app(PostRepository::class)->search('Hello'));
});

it('searches on excerpt', function () {
    Post::factory()->create(['title' => 'Something else', 'excerpt' => 'Hello darkness my old friend', 'published_at' => now()]);
    $this->assertCount(1, app(PostRepository::class)->search('Hello'));
});

it('searches on content', function () {
    Post::factory()->create(['title' => 'Something else', 'excerpt' => 'Something else', 'content' => 'Hello darkness my old friend', 'published_at' => now()]);
    $this->assertCount(1, app(PostRepository::class)->search('Hello'));
});

// Index (Admin)
it('indexes paginated posts for admin', function () {
    Post::factory(16)->create();
    $this->assertCount(15, app(PostRepository::class)->index());
});

it('searches posts on title for admin', function () {
    Post::factory(15)->create();
    Post::factory()->create(['title' => 'Hello darkness my old friend']);
    $this->assertCount(1, app(PostRepository::class)->index('Hello darkness my old friend'));
});

it('filters posts on domain for admin', function () {
    $laravel = Domain::factory()->create();
    $community = Domain::factory()->create();
    Post::factory(5)->create(['blog_domain_id' => $laravel->id]);
    Post::factory(3)->create(['blog_domain_id' => $community->id]);
    $this->assertCount(5, app(PostRepository::class)->index(null, $laravel->id));
});

it('filters published posts for admin', function () {
    Post::factory(5)->create();
    Post::factory(3)->create(['published_at' => now()]);
    $this->assertCount(3, app(PostRepository::class)->index(null, null, 'active'));
});

it('filters hidden posts for admin', function () {
    Post::factory(5)->create();
    Post::factory(3)->create(['published_at' => now()]);
    $this->assertCount(5, app(PostRepository::class)->index(null, null, 'hidden'));
});

// Index (Front)
it('gets paginated posts', function () {
    Post::factory(16)->create(['published_at' => now()]);
    $this->assertCount(15, app(PostRepository::class)->getPosts());
});

it('gets published posts', function () {
    $unpublished = Post::factory()->create();
    $published = Post::factory()->create(['published_at' => now()]);
    $result = app(PostRepository::class)->getPosts()->toJson();

    $this->assertStringContainsString($published->title, $result);
    $this->assertStringNotContainsString($unpublished->title, $result);
});

it('gets domain published posts', function () {
    $laravel = Domain::factory()->create();
    $community = Domain::factory()->create();

    Post::factory(5)->create(['published_at' => now(), 'blog_domain_id' => $laravel->id]);
    Post::factory(3)->create(['published_at' => now(), 'blog_domain_id' => $community->id]);

    $result = app(PostRepository::class)->getPosts($laravel->slug);
    $this->assertCount(5, $result->items());
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

it('gets published toolbox posts', function () {
    $unpublished = Post::factory()->create();
    $published = Post::factory()->create([
        'blog_domain_id' => Domain::factory()->create(['name' => 'Toolbox', 'slug' => 'toolbox'])->id,
        'published_at' => now(),
    ]);
    $result = app(PostRepository::class)->getToolboxPosts()?->toJson() ?: '';

    $this->assertStringContainsString($published->title, $result);
    $this->assertStringNotContainsString($unpublished->title, $result);
});

it('gets published toolbox posts only', function () {
    $otherPost = Post::factory()->create(['published_at' => now()]);
    $tool = Post::factory()->create([
        'blog_domain_id' => Domain::factory()->create(['name' => 'Toolbox', 'slug' => 'toolbox'])->id,
        'published_at' => now(),
    ]);
    $result = app(PostRepository::class)->getToolboxPosts()?->toJson() ?: '';

    $this->assertStringContainsString($tool->title, $result);
    $this->assertStringNotContainsString($otherPost->title, $result);
});

test('toolbox posts method returns null if there is no toolbox domain', function () {
    $this->assertNull(app(PostRepository::class)->getToolboxPosts());
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

it('counts published toolbox posts', function () {
    Post::factory(2)->create(['published_at' => now()]);
    $tool = Post::factory()->create([
        'blog_domain_id' => Domain::factory()->create(['name' => 'Toolbox', 'slug' => 'toolbox'])->id,
        'published_at' => now(),
    ]);
    $unpublished = Post::factory()->create();

    $this->assertEquals(1, app(PostRepository::class)->getToolboxPostsCount());
});

it('returns 0 when no published toolbox posts', function () {
    Post::factory(2)->create(['published_at' => now()]);
    $unpublished = Post::factory()->create();

    $this->assertEquals(0, app(PostRepository::class)->getToolboxPostsCount());
});
