<?php

use App\Http\Livewire\Components\Dashboard\Blog\PostIndex;
use App\Models\Blog\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

it('shows add chapter link', function () {
    Post::factory()->create();
    Livewire::test(PostIndex::class)
        ->assertSee(__('Add Chapter'));
});

it('hides add chapter link when there\'s already one', function () {
    $post = Post::factory()->create();
    $newChapter = Post::factory()->create();
    $post->next()->save($newChapter);

    Livewire::test(PostIndex::class)
        ->set('search', $post->title)
        ->assertDontSee(__('Add Chapter'));
});
