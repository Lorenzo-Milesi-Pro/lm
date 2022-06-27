<?php

namespace Database\Factories\Blog;

use App\Models\Blog\Domain;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog\Post>
 */
class PostFactory extends Factory
{
    public function definition()
    {
        $title = $this->faker->sentence(2);
        return [
            'title' => $title,
            'slug' => str($title)->slug(),
            'blog_domain_id' => Domain::factory()->create(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
