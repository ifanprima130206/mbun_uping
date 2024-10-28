<?php

use App\Http\Controllers\Admin\Master\UserController;
use App\Http\Controllers\Admin\OverviewController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->name('auth.')->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthController::class, 'login'])->name('login');
        Route::post('login', [AuthController::class, 'store'])->name('login');
        Route::get('register', [AuthController::class, 'register'])->name('register');
        Route::post('register', [AuthController::class, 'storeRegister'])->name('register');
    });

    Route::middleware('auth')->group(function () {
        
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    });
});


Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {

    Route::get('/overview', [OverviewController::class, 'index'])->name('overview');

    Route::prefix('users')->name('users.')->group(function () {

        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::put('/update/{user_id}', [UserController::class, 'update'])->name('update');
        Route::delete('/destroy/{user_id}', [UserController::class, 'destroy'])->name('destroy');
        Route::put('/activated/{user_id}', [UserController::class, 'activated'])->name('activated');
        Route::put('/disactivated/{user_id}', [UserController::class, 'disactivated'])->name('disactivated');
    });
});
