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


