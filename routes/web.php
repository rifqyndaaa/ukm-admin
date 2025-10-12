<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/about', function () {
    return view('');
});

// routes/web.php
use App\Http\Controllers\UmkmController;

Route::get('/umkm', [UmkmController::class, 'index']);


use App\Http\Controllers\AuthController;

// Halaman utama redirect ke login
Route::get('/', [AuthController::class, 'index'])->name('login.page');

// Halaman login
Route::get('/login', [AuthController::class, 'index'])->name('login.page');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

// Halaman register
Route::get('/register', function () {
    return view('pages.register', ['title' => 'Register']);
})->name('register.page');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

// Halaman dashboard setelah login
Route::get('/dashboard', function () {
    return view('dashboard', ['title' => 'Dashboard']);
})->name('dashboard');

// Halaman about (pastikan ada file resources/views/about.blade.php)
Route::get('/about', function () {
    return view('about', ['title' => 'About']);
})->name('about');

// Halaman UMKM
Route::get('/umkm', [UmkmController::class, 'index'])->name('umkm');
