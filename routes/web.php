<?php

use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('');
});

// routes/web.php
use App\Http\Controllers\UmkmController;

Route::get('/umkm', [UmkmController::class, 'index']);


Route::get('/login', [AuthController::class, 'index'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Contoh route yang dilindungi login
Route::get('/dataUMKM', function () {
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

Route::get('/editUMKM', function () {
    return view('adminUmkm.edit');
})->name('edit');




Route::get('/create', function () {
    return view('adminUmkm.create');
})->name('create');


use Illuminate\Support\Facades\Route;

Route::resource('umkm', UmkmController::class);
Route::post('/tambah', [UmkmController::class, 'store'])->name('umkm.store');
Route::get('/dataUMKM', [UmkmController::class, 'index'])->name('umkm.index');
Route::get('/editUMKM', [UmkmController::class, 'edit'])->name('umkm.edit');
Route::put('/updtUMKM', [UmkmController::class, 'update'])->name('umkm.update');
Route::delete('/dataUMKM', [UmkmController::class, 'destroy'])->name('umkm.destroy');
