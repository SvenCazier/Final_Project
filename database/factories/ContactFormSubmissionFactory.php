<?php

namespace Database\Factories;

use App\Enums\ContactFormSubject;
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
            "subject" => fake()->randomElement(ContactFormSubject::cases()),
            "message" => fake()->words(200, true),
            "created_at" => fake()->dateTimeBetween("-5 days"),
        ];
    }
}
