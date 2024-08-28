<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FavoriteController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('top');
})->name('top');

Route::get('/articles', [ArticleController::class, 'showmap']);

Route::get('/category', function () {
    return view('category');
})->name('category');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/list/{id}', [ArticleController::class, 'index'])->name('article.list');
Route::post('/list/store', [ArticleController::class, 'store'])->name('article.store');


Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store');//いらないかも？後で検証

Route::get('/create', [ArticleController::class, 'create'])->name('article.create');



Route::get('/detail/{id}', [ArticleController::class, 'show'])->name('article.show');

Route::get('/search', function () {
    return view('search');
})->name('search');

Route::get('/place', function () {
    return view('place');
})->name('place');

Route::get('/search/results', [ArticleController::class, 'search'])->name('search.results');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/post/index', [PostController::class, 'index'])->name('post.index');
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/post/{id}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');

    Route::get('/myposts', [PostController::class, 'myPosts'])->name('myposts');

    Route::get('/create', [ArticleController::class, 'create'])->name('article.create');

    Route::post('/article/{id}/favorite', [FavoriteController::class, 'store'])->name('favorites.favorite');
    Route::delete('/article/{id}/unfavorite',[FavoriteController::class, 'destroy'])->name('favorites.unfavorite');

    Route::get('/user', [ArticleController::class, 'myPosts'])->name('user');
});

require __DIR__ . '/auth.php';
