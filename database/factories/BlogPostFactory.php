<?php

namespace Database\Factories;

use App\Models\BlogPosts;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogPostsFactory extends Factory
{
    protected $model = BlogPosts::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'markdown' => $this->faker->text(500),
        ];
    }
}
