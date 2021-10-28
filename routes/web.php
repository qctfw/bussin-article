<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

Route::group(['prefix' => '/admin', 'as' => 'admin.'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/articles', [AdminController::class, 'index'])->name('articles');
    Route::get('/categories', [AdminController::class, 'index'])->name('categories');
    Route::get('/users', [AdminController::class, 'index'])->name('users');
});

Route::group(['prefix' => '/', 'as' => 'article.'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('{category:slug}', [HomeController::class, 'getByCategory'])->name('category');
    Route::get('{category:slug}/{article:slug}', [HomeController::class, 'show'])->name('show');
});
