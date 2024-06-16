<?php

use App\Http\Controllers\{ContactFormController, HomeController};
use App\Http\Controllers\Admin\{LoginController as AdminLoginController, HomeController as AdminHomeController};
use Illuminate\Support\Facades\Route;

$domain = "portfolio.local";

//Regular routes
$regularRoutes = function () {
    Route::get("/", HomeController::class);
    Route::post("/contact", ContactFormController::class);
};

Route::group(["domain" => "$domain", "prefix" => "{locale?}"], $regularRoutes);
Route::group(["domain" => "www.$domain", "prefix" => "{locale?}"], $regularRoutes);

//Admin routes
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
                Route::get("/message/{message}", [AdminHomeController::class, "show"]);
                Route::patch("/message/{message}", [AdminHomeController::class, "update"]);
                Route::delete("/message/{message}", [AdminHomeController::class, "destroy"]);
                Route::delete("/logout", [AdminLoginController::class, "destroy"]);
            }
        );
    }
);
