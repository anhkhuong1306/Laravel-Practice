<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Models\PostHtml;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use \App\Models\Category;
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

//Route::get('/posts', function () {
//    $posts = PostHtml::all();
//    return view('posts', ['posts' => $posts]);
//});
//
//Route::get('/post/{post}', function ($slug) {
//    //Find a post by its slug and pass it to a view called "post"
//    $post = PostHtml::findOrFail($slug);
//    return view('post', [
//        'post' => $post,
//    ]);
//})->where('post', '[A-z_\-]+');


//Route::get('/', function () {
////    \Illuminate\Support\Facades\DB::listen(function ($query) {
////        logger($query->sql, $query->bindings);
////    });
//    $posts = Post::latest()->with(['category', 'author'])->get();
//    return view('posts', ['posts' => $posts]);
//});

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');

Route::prefix('posts')->name('posts.')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('index');
    //Find a post by its slug and pass it to a view called "post" (Post will find by id of post)
    Route::get('/{post:slug}', [PostController::class, 'show'])->name('show');
    Route::post('/{post:slug}/comment', [CommentController::class, 'store'])->name('comment.stores');
});
