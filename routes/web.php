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



Route::get('/login', [AuthController::class, 'index'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Contoh route yang dilindungi login
Route::get('/dashboard', function () {
    return view('adminUmkm.index');
})->name('index');

Route::get('/about', function () {
    return view('adminUmkm.about');
})->name('about');

Route::get('/product', function () {
    return view('adminUmkm.product');
})->name('product');

Route::get('/store', function () {
    return view('adminUmkm.store');
})->name('store');


Route::get('/contact', function () {
    return view('adminUmkm.contact');
})->name('contact');
