<?php

use App\Domain\MarkdownPost;
use App\Domain\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('/', function () {
    $posts = collect(Storage::disk('posts')->files())
        ->reverse()
        ->map(fn ($file) => Post::make($file));
    return view('welcome', compact('posts'));
});

Route::get('/posts/{title}', function (string $title) {
    $file = Storage::disk('posts')->get("$title.md");

    if (!$file) {
        abort(404);
    }

    $post = MarkdownPost::convert($file);

    return view('post', compact('post'));
});


Route::get('/poems', function () {
    $posts = collect(Storage::disk('poems')->files())
        ->reverse()
        ->map(fn ($file) => Post::make($file));
    return view('poems', compact('posts'));
})->name('poems');

Route::get('/poems/{title}', function (string $title) {
    $file = Storage::disk('poems')->get("$title.md");

    if (!$file) {
        abort(404);
    }

    $post = MarkdownPost::convert($file);

    return view('post', compact('post'));
});

Route::get('/pics/{filename}', function (string $filename) {
    $file = Storage::disk('pics')->get($filename);
    $mime = str($filename)->afterLast('.');

    if (!$file) {
        abort(404);
    }

    return response($file)->header('Content-type','image/'.$mime);
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });
