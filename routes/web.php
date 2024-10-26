<?php

use App\Http\Controllers\Admin\Master\UserController;
use App\Http\Controllers\Admin\OverviewController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->name('dashboard.')->group(function () {

    Route::get('/overview', [OverviewController::class, 'index'])->name('index');

    Route::prefix('users')->name('users.')->group(function () {

        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::put('/update/{user_id}', [UserController::class, 'update'])->name('update');
        Route::delete('/destroy/{user_id}', [UserController::class, 'destroy'])->name('destroy');
        Route::put('/activated/{user_id}', [UserController::class, 'activated'])->name('activated');
        Route::put('/disactivated/{user_id}', [UserController::class, 'disactivated'])->name('disactivated');
    });
});
