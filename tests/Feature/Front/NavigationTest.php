<?php

use App\Http\Livewire\Components\Site\Header\Navigation;
use App\Http\Livewire\Components\Site\Header\NavigationMobile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

// Pages


it('has home page', function () {
    $this->get(route('home'))->assertOk();
});

it('has solutions page', function () {
    $this->get(route('solutions'))->assertOk();
});

it('has blog page', function () {
    $this->get(route('blog'))->assertOk();
});

it('has contact page', function () {
    $this->get(route('contact'))->assertOk();
});

it('has toolbox page', function () {
    $this->get(route('toolbox'))->assertOk();
});

// Navigation

it('has solutions navigation', function () {
    Livewire::test(Navigation::class)->assertSee(route('solutions'));
    Livewire::test(NavigationMobile::class)->assertSee(route('solutions'));
});

it('has blog navigation', function () {
    Livewire::test(Navigation::class)->assertSee(route('blog'));
    Livewire::test(NavigationMobile::class)->assertSee(route('blog'));
});

it('has contact navigation', function () {
    Livewire::test(Navigation::class)->assertSee(route('contact'));
    Livewire::test(NavigationMobile::class)->assertSee(route('contact'));
});

it('has toolbox navigation', function () {
    Livewire::test(Navigation::class)->assertSee(route('toolbox'));
    Livewire::test(NavigationMobile::class)->assertSee(route('toolbox'));
});
