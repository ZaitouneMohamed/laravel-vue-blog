<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence();
        return [
            "title" => $title,
            "slug" => Str::slug($title),
            "body" => fake()->text(),
            "categorie_id" => fake()->numberBetween(1, 10),
            "user_id" => fake()->numberBetween(1, 10),
        ];
    }
}
