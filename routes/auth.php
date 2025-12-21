<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

    Route::get('register', [RegisteredUserController::class, 'create'])->name('register.create');
    Route::post('register', [RegisteredUserController::class, 'store'])->name('register.store');

    Route::get('added', [RegisteredUserController::class, 'added'])->name('added');

});

Route::middleware('auth')->group(function () {
    Route::get('top', [PostsController::class, 'show'])->name('top');
    Route::post('top', [PostsController::class, 'postCreate'])->name('post.create');
    Route::put('post/update', [PostsController::class, 'update'])->name('post.update');
    Route::delete('post/{post}/delete', [PostsController::class, 'delete'])->name('post.delete');

    Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('profile/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('search', [UsersController::class, 'search'])->name('search');
    Route::post('search', [UsersController::class, 'searchForm'])->name('search.form');
    Route::get('users/{user}', [UsersController::class, 'show'])->name('users.show');

    Route::post('follow/{user}', [FollowsController::class, 'store'])->name('follow');
    Route::delete('unfollow/{user}', [FollowsController::class, 'destroy'])->name('unfollow');


    Route::get('follow_list', [FollowsController::class, 'followList'])->name('follow.list');
    Route::get('follower_list', [FollowsController::class, 'followerList'])->name('follower.list');

    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

});
