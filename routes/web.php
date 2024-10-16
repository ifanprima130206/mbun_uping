<?php

use App\Http\Controllers\Admin\OverviewController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->name('dashboard.')->group(function () {

    Route::get('/overview', [OverviewController::class, 'index'])->name('index');
});
