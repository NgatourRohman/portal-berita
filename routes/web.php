<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Public\HomeController as PublicHomeController; // ⬅️ change alias

// Route for public view
Route::get('/', [PublicHomeController::class, 'index'])->name('home');

// Route login/register bawaan Laravel UI
Auth::routes();

// Route for news input admin
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('news', NewsController::class);
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class)->middleware('auth');
});

Route::get('/', [PublicHomeController::class, 'index'])->name('home');
Route::get('/berita/{slug}', [PublicHomeController::class, 'show'])->name('berita.show');
Route::post('/ckeditor/upload', [App\Http\Controllers\Admin\CKEditorUploadController::class, 'upload'])->name('ckeditor.upload');
Route::get('/kategori/{slug}', [PublicHomeController::class, 'category'])->name('berita.kategori');
Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
