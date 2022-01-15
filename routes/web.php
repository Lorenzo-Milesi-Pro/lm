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

Route::get('/', fn() => view('welcome'))->name('home');

Route::get('/solutions', fn() => view('site.solutions'))->name('solutions');

Route::get('/contact', fn() => view('site.contact'))->name('contact');

Route::get('/blog', fn() => view('site.blog'))->name('blog');

Route::middleware(['auth:sanctum', 'verified'])->prefix('dashboard')->group(function () {
    Route::get('/', fn() => view('dashboard'))->name('dashboard');
    Route::get('/blog', fn() => view('dashboard.blog'))->name('dashboard.blog');
});
