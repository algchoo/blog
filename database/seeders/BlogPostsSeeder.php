<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogPosts;

class BlogPostsSeeder extends Seeder
{
    public function run(): void
    {
        BlogPosts::factory()->count(10)->create();
    }
}
