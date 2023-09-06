<?php

declare(strict_types=1);

use App\Http\Controllers\Shells;
use Illuminate\Support\Facades\Route;

// @todo Shells Routes
Route::post('register', Shells\RegisterController::class)->name('register');
