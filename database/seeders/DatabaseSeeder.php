<?php

namespace Database\Seeders;

use App\Models\ContactFormSubmission;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            "email" => "svencazier@gmail.com",
            "password" => "QO8.1BR6~p;lu%4",
        ]);

        ContactFormSubmission::factory(10)->create();
    }
}
