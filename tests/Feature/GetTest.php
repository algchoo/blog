<?php

use App\Models\BlogPosts;
use function Pest\Laravel\get;
use Illuminate\Foundation\Testing\DatabaseMigrations;

uses(DatabaseMigrations::class);

// Static pages
$pages = [
    '/',
    '/author',
    '/resume',
];

foreach ($pages as $page) {
    it("returns a 200 status code for {$page}", function () use ($page) {
        get($page)->assertStatus(200);
    });
}

// Dynamic pages
it('returns 200 on the Writings page', function () {
    BlogPosts::factory()->count(3)->create();
    get('/blog-posts')->assertStatus(200);
});

it('returns 200 on a Blog Post page', function () {
    BlogPosts::factory()->count(3)->create();
    get('/blog-posts/2')->assertStatus(200);
});
