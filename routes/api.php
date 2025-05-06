<?php

use App\Http\Controllers\User\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(["prefix"=> "users"], function () {
    Route::post('/', [RegisterController::class, 'register'])->name('users.register');
});