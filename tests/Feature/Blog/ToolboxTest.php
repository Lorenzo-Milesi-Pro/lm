<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('shows', function () {
    $response = $this->get('/blog/toolbox');

    $response->assertStatus(200);
});
