<?php

declare(strict_types=1);

use App\Http\Controllers\Devices;
use Illuminate\Support\Facades\Route;

// @todo Device Routes
Route::post('register', Devices\RegisterController::class)->name('register');

Route::middleware(['device'])->group(static function (): void {
    Route::get('sync', Devices\SyncController::class)->name('sync');
});
