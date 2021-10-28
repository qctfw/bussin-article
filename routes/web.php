<?php

use App\Http\Controllers\AdminArticleController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('articles', AdminArticleController::class)->except(['show', 'create']);
    Route::resource('categories', AdminCategoryController::class)->except(['show', 'create']);
    Route::get('/users', [AdminController::class, 'index'])->name('users');
});

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::get('change-password', [UserController::class, 'changePassword'])->name('change-password');
});

Route::group(['prefix' => '/', 'as' => 'article.'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('{category:slug}', [HomeController::class, 'getByCategory'])->name('category');
    Route::get('{category:slug}/{article:slug}', [HomeController::class, 'show'])->name('show');
});
