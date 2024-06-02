<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactFormSubmission>
 */
class ContactFormSubmissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "from" => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            "subject" => fake()->words(3, true),
            "message" => fake()->words(200, true),
        ];
    }
}
