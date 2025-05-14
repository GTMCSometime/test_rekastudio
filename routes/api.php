<?php

use App\Http\Controllers\Tag\TagController;
use App\Http\Controllers\Task\TaskController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Middleware\TokenAuthMiddleware;
use Illuminate\Support\Facades\Route;

Route::post('/register', [RegisterController::class, 'register'])->name('users.register');
Route::post('/login', [LoginController::class, 'login'])->name('users.login');


Route::middleware(TokenAuthMiddleware::class)->group(function () {

    Route::apiResource('tasks', TaskController::class);
    Route::apiResource('tags', TagController::class);
});