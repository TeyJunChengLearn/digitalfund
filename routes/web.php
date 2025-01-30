<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ConclusionController;

Route::get('/', [MainPageController::class,'index'])->name('landing.index');

Route::get('/login', [LoginController::class,'index'])->name('login.index');
Route::post('/login',[LoginController::class,'login'])->name('login.post');

Route::get('/conclusion', [ConclusionController::class,'index'])->name('conclusion.index');

Route::get('/article', [ArticleController::class,'index'])->name('article.index');

Route::get('/register', [RegisterController::class,'index'])->name('register.index');
Route::post('/register', [RegisterController::class,'register'])->name('register.post');

Route::get('/comment', [CommentController::class,'index'])->name('comment.index');
Route::post('/addComment', [CommentController::class,'comment'])->name('comment.post');
route::get("/logout",[LogoutController::class,'logout'])->name('logout');
