<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('');
});

// routes/web.php
use App\Http\Controllers\AuthController;



Route::get('/login', [AuthController::class, 'index'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Contoh route yang dilindungi login
Route::get('/dataUMKM', function () {
    return view('adminUmkm.index');
})->name('index');

Route::get('/about', function () {
    return view('pages.webview.about');
})->name('about');

Route::get('/product', function () {
    return view('pages.webview.product');
})->name('product');

Route::get('/store', function () {
    return view('pages.webview.store');
})->name('store');

Route::get('/editUMKM', function () {
    return view('pages.webview.edit');
})->name('edit');




Route::get('/create', function () {
    return view('pages.webview.create');
})->name('create');


use App\Http\Controllers\UmkmController;
use App\Http\Controllers\DataMasyarakatController;

Route::resource('umkm', UmkmController::class);
Route::post('/tambah', [UmkmController::class, 'store'])->name('umkm.store');
Route::get('/dataUMKM', [UmkmController::class, 'index'])->name('umkm.index');
Route::get('/editUMKM', [UmkmController::class, 'edit'])->name('umkm.edit');
Route::put('/updtUMKM', [UmkmController::class, 'update'])->name('umkm.update');
Route::delete('/dataUMKM', [UmkmController::class, 'destroy'])->name('umkm.destroy');









// Auth Routes
// Login routes
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Register routes
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Logout dan dashboard
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');


// Protected Routes (contoh)
Route::middleware(['auth'])->group(function () {
    // Tambahan routes protected lainnya
});
//warga routes
Route::get('/datamasyarakat', [DataMasyarakatController::class, 'index'])->name('datamasyarakat.index');
Route::get('/datamasyarakat/create', [DataMasyarakatController::class, 'create'])->name('datamasyarakat.create');
Route::post('/datamasyarakat/store', [DataMasyarakatController::class, 'store'])->name('datamasyarakat.store');
Route::get('/datamasyarakat/edit/{id}', [DataMasyarakatController::class, 'edit'])->name('datamasyarakat.edit');
Route::post('/datamasyarakat/update/{id}', [DataMasyarakatController::class, 'update'])->name('datamasyarakat.update');
Route::delete('/datamasyarakat/delete/{id}', [DataMasyarakatController::class, 'destroy'])->name('datamasyarakat.destroy');

//user routes
use App\Http\Controllers\DataUserController;

Route::get('/datauser', [DataUserController::class, 'index'])->name('datauser.index');
Route::get('/datauser/create', [DataUserController::class, 'create'])->name('datauser.create');
Route::post('/datauser', [DataUserController::class, 'store'])->name('datauser.store');
Route::get('/datauser/{id}/edit', [DataUserController::class, 'edit'])->name('datauser.edit');
Route::put('/datauser/{id}', [DataUserController::class, 'update'])->name('datauser.update');
Route::delete('/datauser/{id}', [DataUserController::class, 'destroy'])->name('datauser.destroy');

