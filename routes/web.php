<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();


Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::redirect('/home', '/');

Route::get('post/theme/{id}', [\App\Http\Controllers\PostController::class, 'postId'])->name('post.postId');
Route::get('post/create/{themeId}', [\App\Http\Controllers\PostController::class, 'create'])->name('post.create.new');
Route::resource('post', \App\Http\Controllers\PostController::class);

Route::get('/profile/{name}', [\App\Http\Controllers\HomeController::class, 'show']);
Route::get('/profile/ban/{user}', [\App\Http\Controllers\HomeController::class, 'ban'])->name('profile.ban');
Route::get('/profile/unban/{user}', [\App\Http\Controllers\HomeController::class, 'unban'])->name('profile.unban');

Route::middleware(['role:admin'])->prefix('admin_panel')->group(function (){
    Route::get('/',[App\Http\Controllers\Admin\HomeController::class, 'index']);
    Route::resource('section', \App\Http\Controllers\Admin\SectionController::class);
    Route::resource('theme', \App\Http\Controllers\Admin\ThemeController::class);
    Route::resource('user', \App\Http\Controllers\Admin\UserController::class);
});
