<?php

use App\Http\Livewire\Components\Site\Sections\Blog;
use App\Http\Livewire\Components\Site\Sections\ContactForm;
use App\Http\Livewire\Components\Site\Sections\CTA;
use App\Http\Livewire\Components\Site\Sections\FeatureCenter2x2Grid;
use App\Http\Livewire\Components\Site\Sections\Features;
use App\Http\Livewire\Components\Site\Sections\Heading;
use App\Http\Livewire\Components\Site\Sections\Hero;
use App\Http\Livewire\Components\Site\Sections\Posts;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

// Home

test('home has hero section', function () {
    $this->get(route('home'))->assertSeeLivewire(Hero::class);
});

test('home has features section', function () {
    $this->get(route('home'))->assertSeeLivewire(Features::class);
});

test('home has no posts section if no posts', function () {
    $this->get(route('home'))->assertDontSeeLivewire(Posts::class);
});

test('home has no posts section if unpublished  posts', function () {
    $this->get(route('home'))->assertDontSeeLivewire(Posts::class);
});

test('home has CTA section', function () {
    $this->get(route('home'))->assertSeeLivewire(CTA::class);
});

// Solutions 

test('solutions has heading section', function () {
    $this->get(route('solutions'))->assertSeeLivewire(Heading::class);
});

test('solutions has features section', function () {
    $this->get(route('solutions'))->assertSeeLivewire(FeatureCenter2x2Grid::class);
});

test('solutions has CTA section', function () {
    $this->get(route('solutions'))->assertSeeLivewire(CTA::class);
});

// Blog

test('blog has blog section', function () {
    $this->get(route('blog'))->assertSeeLivewire(Blog::class);
});

// Contact

test('contact has contact form', function () {
    $this->get(route('contact'))->assertSeeLivewire(ContactForm::class);
});
