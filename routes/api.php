<?php

use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\RegisterController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix"=> "users"], function () {
    Route::post('/register', [RegisterController::class, 'register'])->name('users.register');
    Route::post('/login', [LoginController::class, 'login'])->name('users.login');
});