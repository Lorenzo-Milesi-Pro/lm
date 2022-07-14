<?php

use App\Models\Blog\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can have a next and a previous post', function () {
    $chapterOne = Post::factory()->create(['published_at' => now()]);
    $chapterTwo = Post::factory()->create(['published_at' => now()]);
    $chapterOne->next()->save($chapterTwo);
    $chapterOne->save();
    $chapterOne->refresh();

    $this->assertEquals($chapterTwo->title, $chapterOne->next->title);
    $this->assertEquals($chapterOne->title, $chapterTwo->previous->title);
});
