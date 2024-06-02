<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Display login form
     */
    public function index()
    {
        return view("admin.login");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function authenticate(Request $request)
    {
        $attributes = request()->validate([
            "email" => ["required", "email"],
            "password" => ["required"],
        ]);

        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                "invalid_credentials" => __("auth.invalid_credentials"),
            ]);
        }

        request()->session()->regenerate();

        return redirect("/");
    }

    public function destroy()
    {
        Auth::logout();
        return redirect("/");
    }
}
