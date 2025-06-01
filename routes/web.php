<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CKEditorUploadController;
use App\Http\Controllers\Public\HomeController as PublicHomeController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\User\ProfileController;

// ========================
// ROUTE: Frontend (Public)
// ========================
Route::get('/', [PublicHomeController::class, 'index'])->name('home');
Route::get('/berita/{slug}', [PublicHomeController::class, 'show'])->name('berita.show');
Route::get('/kategori/{slug}', [PublicHomeController::class, 'category'])->name('berita.kategori');

// ========================
// ROUTE: Auth (Laravel UI)
// ========================
Auth::routes();

// ========================
// ROUTE: CKEditor Upload
// ========================
Route::post('/ckeditor/upload', [CKEditorUploadController::class, 'upload'])->name('ckeditor.upload');

// ========================
// ROUTE: Sitemap XML
// ========================
Route::get('/sitemap.xml', [SitemapController::class, 'index']);

// ========================
// ROUTE: Admin Panel (Protected by auth + admin)
// ========================
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('news', NewsController::class);
    Route::resource('categories', CategoryController::class);
});

// ========================
// ROUTE: Profile Controller
// ========================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
});
