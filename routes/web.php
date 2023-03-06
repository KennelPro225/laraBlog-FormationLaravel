<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */
Route::get('/', [ArticleController::class, "index"]);
Route::get('/home', [ArticleController::class, "index"]);
Route::middleware(["auth"])->group(function () {
    Route::controller(ArticleController::class)->group(function () {
        Route::get('/article/{article}', "Show")->name('article.show')->withoutMiddleware('auth');
        Route::get('/article/{article}/edit', "Edit")->name('article.edit');
        Route::put('/article/{article}/update', "Update")->name('article.update');
        Route::delete('/article/{article}/delete', "Delete")->name('article.delete');
        Route::post('/article/{article}/confirmation', "DeleteConfirmation")->name('article.confirmation');
        Route::get("/publier-article", function () {
            return view('publish');
        });
        Route::post('/publier-article', [ArticleController::class, "Store"]);
    });
    Route::get('/logout', [UserController::class,'Logout']);
});

Route::middleware(['guest'])->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/login', function () {
            return view('auth.login');
        })->name('login');
        Route::post('/login', "Login")->name('login');

        Route::get('/register', function () {
            return view('auth.register');
        });
        Route::post('/register', "Register");

    });
});
