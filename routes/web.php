<?php

use App\Http\Controllers\{ContactFormController, HomeController};
use App\Http\Controllers\Admin\{LoginController as AdminLoginController, HomeController as AdminHomeController};
use Illuminate\Support\Facades\Route;

$domain = "portfolio.local";

Route::group(
    ["prefix" => "{locale?}", "domain" => "www.$domain"],
    function () {
        Route::get("/", HomeController::class);
        Route::post("/contact", ContactFormController::class);
    }
);

Route::group(
    ["prefix" => "{locale?}", "domain" => "admin.$domain"],
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
                Route::get("/message/{id}", [AdminHomeController::class, "show"]);
                Route::delete("/message/{id}", [AdminHomeController::class, "destroy"]);
                Route::delete("/logout", [AdminLoginController::class, "destroy"]);
            }
        );
    }
);
