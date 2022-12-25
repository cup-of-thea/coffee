<?php

use App\Domain\MarkdownPost;
use App\Domain\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\Footnote\FootnoteExtension;
use League\CommonMark\MarkdownConverter;

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

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });
