<?php

use App\Models\Website;

test('returns a successful response', function () {
    // Ensure there's a Website record so views don't error
    Website::factory()->create([
        'title' => 'Test Site',
        'meta_description' => 'Test Description',
        'meta_tags' => 'test,site',
        'logo' => 'website/defaultlogo.png',
        'favicon' => 'website/defaultfav.png',
        'fb_app_id' => '1234567890',
    ]);

    $response = $this->get('/');

    $response->assertStatus(200);
});