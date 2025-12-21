<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\PesananController; // ✅ Tambahkan ini
use Illuminate\Support\Facades\Route;

// ========================
// AUTH ROUTES
// ========================
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

// ========================
// PUBLIC PAGES (Semua Bisa Akses)
// ========================
Route::get('/', function () {
    return view('pages.webview.index');
})->name('home');

Route::view('/about', 'pages.webview.about')->name('about');
Route::view('/product', 'pages.webview.product')->name('product');
Route::view('/store', 'pages.webview.store')->name('store');
Route::view('/blog', 'pages.webview.blog')->name('blog');
Route::view('/contact', 'pages.webview.contact')->name('contact');

// ========================
// PROTECTED ROUTES (HARUS LOGIN)
// ========================
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('pages.webview.index');
    })->name('dashboard');

    // ========================
    // PESANAN ROUTES (UNTUK SEMUA ROLE YANG LOGIN)
    // ========================
    Route::resource('pesanan', PesananController::class);

    // ========================
    // ADMIN AREA — FULL ACCESS
    // ========================
    Route::resource('User', UserController::class);
    Route::middleware(['checkrole:admin'])->group(function () {

        Route::resource('Warga', WargaController::class);
        Route::resource('Umkm', UmkmController::class);
        Route::resource('produk', ProdukController::class);

        // MEDIA hanya admin
        Route::prefix('media')->group(function () {
            Route::get('/', [MediaController::class, 'index'])->name('media.index');
            Route::post('/', [MediaController::class, 'store'])->name('media.store');
            Route::get('/{id}', [MediaController::class, 'show'])->name('media.show');
            Route::put('/{id}', [MediaController::class, 'update'])->name('media.update');
            Route::delete('/{id}', [MediaController::class, 'destroy'])->name('media.destroy');
        });
    });

    // ========================
    // USER AREA — akses terbatas
    // ========================
    Route::middleware(['checkrole:user'])->group(function () {
        // Route untuk user biasa (jika ada yang khusus)
        // Note: Produk dan Warga sudah diakses admin, sesuaikan jika perlu
    });
});

use App\Http\Controllers\DetailPesananController;

Route::middleware(['auth'])->group(function () {

    Route::resource('pesanan', PesananController::class);
    Route::resource('detail-pesanan', DetailPesananController::class);

});

use App\Http\Controllers\UlasanProdukController;

Route::resource('ulasan-produk', UlasanProdukController::class);

