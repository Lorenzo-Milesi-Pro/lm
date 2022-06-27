<?php

use App\Http\Livewire\Components\Site\Sections\Blog;
use App\Http\Livewire\Components\Site\Sections\Posts;
use App\Models\Blog\Domain;
use App\Models\Blog\Post;
use App\Repositories\PostRepository;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

it('filters out toolbox domain posts on recent posts component', function () {
    $post = Post::factory()->create(['published_at' => now()]);
    $tool = Post::factory()->create([
        'blog_domain_id' => Domain::factory()->create(['name' => 'Toolbox', 'slug' => 'toolbox'])->id,
        'published_at' => now(),
    ]);

    Livewire::test(Posts::class)->assertDontSee($tool->title);
    Livewire::test(Posts::class)->assertSee($post->title);
});

it('filters out toolbox domain posts on blog component', function () {
    $post = Post::factory()->create(['published_at' => now()]);
    $tool = Post::factory()->create([
        'blog_domain_id' => Domain::factory()->create(['name' => 'Toolbox', 'slug' => 'toolbox'])->id,
        'published_at' => now(),
    ]);

    Livewire::test(Blog::class)->assertDontSee('Toolbox');
    Livewire::test(Blog::class)->assertDontSee($tool->title);
    Livewire::test(Blog::class)->assertSee($post->title);
});

it('increases post views count everytime someone opens post link', function () {
    $post = Post::factory()->create(['published_at' => now()]);
    $this->assertEquals(0, $post->views);
    $this->get(route('post', $post));
    $post->refresh();
    $this->assertEquals(1, $post->views);
});

it('updates post viewed_at everytime someone opens post link', function () {
    $post = Post::factory()->create(['published_at' => now()]);
    $this->assertEquals(null, $post->viewed_at);
    $this->get(route('post', $post));
    $post->refresh();
    $this->assertEquals(now(), $post->viewed_at);
    $oldViewedAt = $post->viewed_at;
    $theDayAfter = Carbon::now()->addDay(1);
    Carbon::setTestNow($theDayAfter);
    $this->get(route('post', $post));
    $post->refresh();
    $this->assertEquals(now(), $post->viewed_at);
    Carbon::setTestNow();
});
