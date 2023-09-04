<?php

declare(strict_types=1);

use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Route;

// @todo Auth Routes
Route::post('login', Auth\LoginController::class)->name('login');
Route::post('register', Auth\RegisterController::class)->name('register');
