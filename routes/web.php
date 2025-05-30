<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Public\HomeController;

Route::get('/', [HomeController::class, 'index']);

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('news', NewsController::class);
});
