<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;

Route::resource('Warga', WargaController::class);
Route::resource('Umkm', UmkmController::class);
Route::resource('User', UserController::class);


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Setelah login berhasil
Route::get('/umkm', function () {
    return view('pages.umkm.index');
})->name('umkm.index');



// Contoh route yang dilindungi login

Route::get('/', function () {
    return view('pages.webview.index');
})->name('home');

Route::get('/about', function () {
    return view('pages.webview.about');
})->name('about');

Route::get('/product', function () {
    return view('pages.webview.product');
})->name('product');

Route::get('/store', function () {
    return view('pages.webview.store');
})->name('store');

Route::get('/blog', function () {
    return view('pages.webview.blog');
})->name('blog');

Route::get('/contact', function () {
    return view('pages.webview.contact');
})->name('contact');



use App\Http\Controllers\ProdukController;

Route::resource('produk', ProdukController::class);
