<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

    Route::get('register', [RegisteredUserController::class, 'create'])->name('register.create');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('added', [RegisteredUserController::class, 'added']);
    Route::post('added', [RegisteredUserController::class, 'added']);

});

// Route::middleware('auth')->group(function () {
//     Route::get('top', [PostsController::class, 'index']);

//     Route::get('profile', [ProfileController::class, 'profile']);

//     Route::get('search', [UsersController::class, 'index']);

//     Route::get('follow-list', [PostsController::class, 'index']);
//     Route::get('follower-list', [PostsController::class, 'index']);

// });
