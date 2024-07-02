<?php

namespace App\Http\Controllers;

use App\Enums\ContactFormSubject;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view(
            "index",
            ["projects" => Project::all()]
        );
    }
}
