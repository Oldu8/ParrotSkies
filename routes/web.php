<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [ClientController::class, 'index'])->name('client.home');
Route::get('/posts', [ClientController::class, 'showAllPosts'])->name('client.all-posts');
Route::get('/categories', [ClientController::class, 'showAllCategories'])->name('client.all-categories');
Route::get('/posts/{slug}', [ClientController::class, 'showPostBySlug'])->name('client.post.show');

Route::group(['prefix' => 'admin'], function () {
    Route::view('/welcome', 'admin.welcome')->name('admin.welcome');
    // Route::get('/posts', [PostController::class, 'index'])->name('admin.posts.index');
    Route::resource('posts', PostController::class);
    Route::post('/posts/{post}/post-status', [PostController::class, 'toggleActive'])->name('posts.toggle-active');
    Route::resource('categories', CategoriesController::class);
});
