<?php

namespace Database\Seeders;

use App\Models\{ContactFormSubmission, Project, Technology, User};
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

        $technologies = Technology::factory()->createMany([
            [
                "name" => "HTML5",
                "type" => "0",
            ],
            [
                "name" => "CSS3",
                "type" => "0",
            ],
            [
                "name" => "JavaScript",
                "type" => "0",
            ],
            [
                "name" => "TypeScript",
                "type" => "0",
            ],
            [
                "name" => "PHP",
                "type" => "0",
            ],
            [
                "name" => "SCSS",
                "type" => "2",
            ],
            [
                "name" => "Angular",
                "type" => "3",
            ],
            [
                "name" => "Express.js",
                "type" => "3",
            ],
            [
                "name" => "MongoDB",
                "type" => "4",
            ],
            [
                "name" => "MySQL",
                "type" => "4",
            ],
            [
                "name" => "RethinkDB",
                "type" => "4",
            ],
            [
                "name" => "Twig",
                "type" => "5",
            ],
            [
                "name" => "Node.js",
                "type" => "6",
            ],
        ]);

        $projects = Project::factory()->createMany([
            [
                "id" => "9c64d46c-1ff4-4a6f-a8d0-39fa282b465f",
                "name" => "MeTube",
                "description" => "MeTube, inspired by YouTube, is a project designed as a platform for hosting my own videos. Originally developed using pure Node.js with the EJS templating engine, this second iteration runs on an API developed in Node.js and a frontend built in Angular. Furthermore, it features chapters, subtitles, and a Fuzzy Matching search algorithm now.",
                "image" => "",
                "live_url" => "",
                "github_url" => "",
            ],
            [
                "id" => "9c64d46c-2172-4545-8177-010be3492b9a",
                "name" => "Jim(Bot)",
                "description" => "JIM(Bot) supports a Whiteout Survival alliance with a PHP-backed website and JimBot, a Discord bot that personifies an event API. JimBot seamlessly integrates with both Discord and the alliance's website, facilitating real-time event management and enhancing communication and coordination among alliance members.",
                "image" => "",
                "live_url" => "",
                "github_url" => "",
            ],
            [
                "id" => "9c64d46c-22cd-4ed5-9f35-f85c6b9e3204",
                "name" => "Caesar Code",
                "description" => "Implemented as a JavaScript class, this project implements the Caesar Cipher using modulo arithmetic, with the possibility of importing a file.",
                "image" => "",
                "live_url" => "",
                "github_url" => "",
            ],
            [
                "id" => "9c64d46c-23ef-4278-a10a-024f37781f2c",
                "name" => "Schattenjager",
                "description" => "Schattenjager is a Pacman-style game implemented in JavaScript, challenging players with adjustable levels of randomly placed walls, lives, treasures, and enemy movement speeds. Navigate through the maze, collect treasures, avoid enemies, and see if you can conquer its challenges!",
                "image" => "",
                "live_url" => "",
                "github_url" => "",
            ],
            [
                "id" => "9c64d46c-24fd-4cdf-84b6-0ce6588841cf",
                "name" => "Pizza",
                "description" => "Pizza is a web application structured in a layered MVC format for a pizza webshop. It features a quirky approach to managing customer data to minimize duplicate entries, ensuring seamless guest checkout and registration. Find out more by checking it out on GitHub.",
                "image" => "",
                "live_url" => "",
                "github_url" => "",
            ],
            [
                "id" => "9c64d46c-2629-4623-b0b6-d6b4d22ff778",
                "name" => "Prularia",
                "description" => "Prularia is a webshop application developed collaboratively using SCRUM methodology, where I integrated several previously developed components to streamline our development process. Given that it was a collaborative project, not all code was written by me, but as a general rule you could say that sections with lots of comments were at least visited by me.",
                "image" => "",
                "live_url" => "",
                "github_url" => "",
            ]
        ]);

        $projects[0]->technologies()->attach([
            $technologies[0]->id,
            $technologies[5]->id,
            $technologies[2]->id,
            $technologies[3]->id,
            $technologies[12]->id,
            $technologies[7]->id,
            $technologies[6]->id,
            $technologies[10]->id,
        ]);

        $projects[1]->technologies()->attach([
            $technologies[0]->id,
            $technologies[0]->id,
            $technologies[5]->id,
            $technologies[2]->id,
            $technologies[4]->id,
            $technologies[11]->id,
            $technologies[12]->id,
            $technologies[7]->id,
            $technologies[8]->id,
        ]);

        $projects[2]->technologies()->attach([
            $technologies[0]->id,
            $technologies[0]->id,
            $technologies[2]->id,
        ]);

        $projects[3]->technologies()->attach([
            $technologies[0]->id,
            $technologies[0]->id,
            $technologies[1]->id,
            $technologies[2]->id,
        ]);

        $projects[4]->technologies()->attach([
            $technologies[0]->id,
            $technologies[0]->id,
            $technologies[1]->id,
            $technologies[4]->id,
            $technologies[9]->id,
        ]);

        $projects[5]->technologies()->attach([
            $technologies[0]->id,
            $technologies[0]->id,
            $technologies[1]->id,
            $technologies[4]->id,
            $technologies[2]->id,
            $technologies[9]->id,
        ]);


        User::factory()->create([
            "email" => "svencazier@gmail.com",
            "password" => "QO8.1BR6~p;lu%4",
        ]);
    }
}
