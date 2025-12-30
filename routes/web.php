<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Models\Article;
use App\Models\User;
use App\Models\Profile;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/articles',[ArticleController::class,'index']);

Route::get('/articles/detail/{id}',[ArticleController::class,'detail']);



Route::get('/articles/detail', function () {
 $articles= Article::all();
    dd($articles);  ;
})->name('article.detail');

Route::get('/articles/more', function() {
 return redirect()->route('article.detail');
});

Route::get('/users', [UserController::class, 'index']);

Route::get('/profile', [ProfileController::class, 'index']);

Route::get('/post-list',[UserController::class,'postList']);

Route::get('/post-user', [PostController::class, 'postedUser']);

Route::get('/user/likes', [LikeController::class, 'showLikedPosts']);

Route::get('/post/likers', [LikeController::class, 'showPostLikers']);

Route::get('/user/{id}/latest-comment', [UserController::class, 'showLatestComment']);