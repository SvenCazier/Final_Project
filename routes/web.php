<?php

use App\Http\Controllers\{ContactFormController, HomeController};
use App\Http\Controllers\Admin\{LoginController as AdminLoginController, HomeController as AdminHomeController};
use Illuminate\Support\Facades\Route;

$domain = "portfolio.local";

Route::group(
    ["domain" => "www.$domain", "prefix" => "{locale?}"],
    function () {
        Route::get("/", HomeController::class);
        Route::post("/contact", ContactFormController::class);
    }
);

Route::group(
    ["domain" => "admin.$domain", "prefix" => "{locale?}"],
    function () {
        Route::middleware("guest")->group(
            function () {
                Route::get("/login", [AdminLoginController::class, "index"])->name("login");
                Route::post("/login", [AdminLoginController::class, "authenticate"]);
            }
        );
        Route::middleware("auth")->group(
            function () {
                Route::get("/", [AdminHomeController::class, "index"]);
                Route::get("/messages/{message}", [AdminHomeController::class, "show"]);
                Route::patch("/messages/{message}", [AdminHomeController::class, "update"]);
                Route::delete("/messages/{message}", [AdminHomeController::class, "destroy"]);
                Route::delete("/logout", [AdminLoginController::class, "destroy"]);
            }
        );
    }
);
