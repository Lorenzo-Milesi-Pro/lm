<?php

use App\Models\Blog\Post;
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

Route::get('/toolbox', fn() => view('site.toolbox'))->name('toolbox');

Route::get('/post/{post}', function(Post $post)  {

    if ($post->published_at) {
        $post->views++;
        $post->viewed_at = now();
        $post->save();
        return view('site.blog.post', compact('post'));
    }

    abort('404');

} )->name('post');

Route::get('/post/preview/{uuid}', function (string $uuid) {
    $post = Post::where('preview', '=', $uuid)->firstOrFail();

    if($post->published_at) {
        return redirect(route('post', $post));
    }

    return view('site.blog.post', compact('post'));
})->name('preview');

Route::get('/search', fn() => view('site.search'))->name('search');

Route::middleware(['auth:sanctum', 'verified'])->prefix('dashboard')->group(function () {
    Route::get('/', fn() => view('dashboard'))->name('dashboard');
    Route::get('/blog', fn() => view('dashboard.blog'))->name('dashboard.blog');
    Route::get('/domains', fn() => view('dashboard.domains'))->name('dashboard.domains');
});
