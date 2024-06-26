<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminAuthController;

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


Auth::routes();

Route::get('/', [ClientController::class, 'index'])->name('client.home');
Route::get('/posts', [ClientController::class, 'showAllPosts'])->name('client.all-posts');
Route::get('/categories', [ClientController::class, 'showAllCategories'])->name('client.all-categories');
Route::get('/posts/{slug}', [ClientController::class, 'showPostBySlug'])->name('client.post.show');

Route::group(['prefix' => 'admin'], function () {

    Route::group(['middleware' => 'guest'], function () {
        Route::get('/register', [AdminAuthController::class, 'register'])->name('admin-register');
        Route::post('/register', [AdminAuthController::class, 'registerPost'])->name('admin-register');
        Route::get('/login', [AdminAuthController::class, 'login'])->name('admin-login');
        Route::post('/login', [AdminAuthController::class, 'loginPost'])->name('admin-login');
    });

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::view('/welcome', 'admin.welcome')->name('admin.welcome');
        Route::delete('/logout', [AdminAuthController::class, 'logout'])->name('logout');
        Route::resource('posts', PostController::class);
        Route::post('/posts/{post}/post-status', [PostController::class, 'toggleActive'])->name('posts.toggle-active');
        Route::resource('categories', CategoriesController::class);
    });

});

// login in admin panel
// description format
// time format
// tags
// likes 
// comments