<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\FollowsController;
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


Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
// Authenticate.phpで定義したルートに名前をつけるために名前付きルート
Route::post('login', [AuthenticatedSessionController::class, 'store']);
Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('register', [RegisteredUserController::class, 'create']);
Route::post('register', [RegisteredUserController::class, 'store']);

Route::get('added', [RegisteredUserController::class, 'added']);

Route::get('top', [PostsController::class, 'index']);
Route::post('top', [PostsController::class, 'postCreate']);
Route::get('top', [PostsController::class, 'show']);
Route::delete('post/{post}/delete', [PostsController::class, 'delete']);

Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
Route::post('profile', [ProfileController::class, 'update']);

Route::get('search', [UsersController::class, 'search']);
Route::post('search', [UsersController::class, 'searchForm']);

Route::post('/follow/{user}', [FollowsController::class, 'store'])->name('follow');
Route::delete('/unfollow/{user}', [FollowsController::class, 'destroy'])->name('unfollow');

Route::get('follow-list', [PostsController::class, 'index']);
Route::get('follower-list', [PostsController::class, 'index']);


require __DIR__ . '/auth.php';
//auth.php に定義したルートを web.php にまとめて読み込む
