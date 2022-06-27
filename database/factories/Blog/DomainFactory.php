<?php

namespace Database\Factories\Blog;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog\Domain>
 */
class DomainFactory extends Factory
{
    public function definition()
    {
        $name = $this->faker->sentence(2);

        return [
            'name' => $name,
            'slug' => str($name)->slug(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
