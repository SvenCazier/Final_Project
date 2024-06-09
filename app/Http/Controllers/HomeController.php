<?php

namespace App\Http\Controllers;

use App\Enums\ContactFormSubject;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        //$subjects = ContactFormSubject::cases();
        return view("index"/*, compact("subjects")*/);
    }
}
