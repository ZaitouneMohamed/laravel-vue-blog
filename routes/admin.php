<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Inertia\Inertia;

Route::middleware(["auth", "role:admin"])->name("admin.")->prefix("admin")->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', "Home");
    });
    Route::resource("categorie", CategorieController::class);
    Route::resource("tag", TagController::class);
    Route::resource("post", PostController::class)->except("show");
});
