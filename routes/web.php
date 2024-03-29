<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Landing/Index', [
        'route' => Route::getCurrentRoute()->uri(),
        'posts' => Post::with(["user", "categorie", "comments"])->take(5)->get()
    ]);
})->name('home');

Route::resource("post", PostController::class)->only("show");

Route::controller(HomeController::class)->group(function () {
    Route::post("AddComment", 'AddComment')->name("addNewComment");
    Route::get("categories/{categorie}", 'GetPostsOfCategorie')->name("GetPostsOfCategorie");
    Route::get("posts", 'GetAllPosts')->name("GetAllPosts");
});

Route::permanentRedirect('/dashboard', '/admin');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
