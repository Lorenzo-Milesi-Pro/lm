<?php

use App\Http\Livewire\Components\Site\Sections\FeaturedPosts;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

it('does not show if there is less than 3 posts', function () {
    Livewire::test(FeaturedPosts::class)->assertSet('show', false);
});
