<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
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