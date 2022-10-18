<?php

use App\Models\Blog\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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

Route::feeds();

Route::get('/', fn() => view('welcome'))->name('home');

Route::get('/theme', function (Request $request) {
    $theme = Cache::get("theme:{$request->ip()}") ?? 'light';
    Cache::put("theme:{$request->ip()}", 'dark' === $theme ? 'light' : 'dark');
    return back();
})->name('theme');

Route::get('/contact', fn() => view('site.contact'))->name('contact');

Route::get('/blog', fn() => view('site.blog'))->name('blog');

Route::get('/toolbox', fn() => view('site.toolbox'))->name('toolbox');

Route::get('/story', fn() => view('site.story'))->name('story');

Route::get('/changelog', function () {
    try {
        $content = file_get_contents('https://raw.githubusercontent.com/Lorenzo-Milesi-Pro/lm/main/CHANGELOG.md');
    } catch (ErrorException $e) {
        $content = '';
    }
    return view('site.changelog', compact('content'));
})->name('changelog');

Route::get('/post/{post}', function (Request $request, Post $post) {
    if ($post->published_at) {
        dispatch(function () use ($post, $request) {
            Cache::remember("post_view:{$request->ip()}:$post->id", 86400, function () use ($post) {
                $post->views++;
                $post->viewed_at = now();
                $post->timestamps = false;
                $post->save();

                return 1;
            });
        })->afterResponse();

        return view('site.blog.post', compact('post'));
    }

    abort('404');
})->name('post');

Route::get('/post/{post}/classic', function (Request $request, Post $post) {
    if ($post->published_at) {
        if($post->classic?->published_at) {
            return view('site.blog.classic', compact('post'));
        }
        return view('site.blog.post', compact('post'));
    }

    abort('404');
})->name('post.classic');

Route::get('/post/preview/{uuid}', function (string $uuid) {
    $post = Post::where('preview', '=', $uuid)->firstOrFail();

    if ($post->published_at) {
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
