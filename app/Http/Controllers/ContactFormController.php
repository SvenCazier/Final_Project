<?php

namespace App\Http\Controllers;

use App\Enums\ContactFormSubject;
use App\Models\ContactFormSubmission;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ContactFormController extends Controller
{
    public function __invoke(Request $request)
    {
        $attributes = $request->validate([
            "name" => ["required"],
            "email" => ["required", "email", "max:254"],
            "subject" => ["required", Rule::in(array_column(ContactFormSubject::cases(), "value"))],
            "message" => ["required", "max:"],
        ]);

        $attributes["from"] = $attributes["name"];
        unset($attributes["name"]);

        ContactFormSubmission::create($attributes);

        return redirect("/");
    }
}
