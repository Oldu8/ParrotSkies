<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index'])->name('client.home');

Route::group(['prefix' => 'admin'], function () {
    Route::view('/welcome', 'admin.welcome')->name('admin.welcome'); // sdelat home controller hz nahuya kone4no
    // Route::get('/posts', [PostController::class, 'index'])->name('admin.posts.index');
    Route::resource('posts', PostController::class);
    Route::post('/posts/{post}/post-status', [PostController::class, 'toggleActive'])->name('posts.toggle-active');
    Route::resource('categories', CategoriesController::class);
});
