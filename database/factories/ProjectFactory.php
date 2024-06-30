<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->unique()->name(),
            "description" => fake()->words(50),
            "image" => fake()->imageUrl(),
            "live_url" => fake()->url(),
            "github_url" => fake()->url(),
        ];
    }
}
