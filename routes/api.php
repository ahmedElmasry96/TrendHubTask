<?php

use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ReplayController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// create user
Route::post('/user/create', [UserController::class, 'create'])->name('user.create');

//create post by any user
Route::post('/post/create', [PostController::class, 'create'])->name('post.create');

//create comment by any user
Route::post('/comment/create', [CommentController::class, 'create'])->name('comment.create');

//create replay by any user
Route::post('/replay/create', [ReplayController::class, 'create'])->name('replay.create');
