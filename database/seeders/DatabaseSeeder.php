<?php

namespace Database\Seeders;

use App\Models\{ContactFormSubmission, Project, User};
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        ContactFormSubmission::factory(10)->create();

        Project::factory()->createMany([
            [
                "id" => "9c64d46c-1ff4-4a6f-a8d0-39fa282b465f",
                "name" => "MeTube",
                "description" => "",
                "image" => "",
                "live_url" => "",
                "github_url" => "",
            ],
            [
                "id" => "9c64d46c-2172-4545-8177-010be3492b9a",
                "name" => "Jim(Bot)",
                "description" => "",
                "image" => "",
                "live_url" => "",
                "github_url" => "",
            ],
            [
                "id" => "9c64d46c-22cd-4ed5-9f35-f85c6b9e3204",
                "name" => "Caesar Code",
                "description" => "",
                "image" => "",
                "live_url" => "",
                "github_url" => "",
            ],
            [
                "id" => "9c64d46c-23ef-4278-a10a-024f37781f2c",
                "name" => "Schattenjager",
                "description" => "",
                "image" => "",
                "live_url" => "",
                "github_url" => "",
            ],
            [
                "id" => "9c64d46c-24fd-4cdf-84b6-0ce6588841cf",
                "name" => "Pizza",
                "description" => "",
                "image" => "",
                "live_url" => "",
                "github_url" => "",
            ],
            [
                "id" => "9c64d46c-2629-4623-b0b6-d6b4d22ff778",
                "name" => "Prularia",
                "description" => "",
                "image" => "",
                "live_url" => "",
                "github_url" => "",
            ]
        ]);

        User::factory()->create([
            "email" => "svencazier@gmail.com",
            "password" => "QO8.1BR6~p;lu%4",
        ]);
    }
}
