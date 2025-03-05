<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;

// Halaman Home
Route::get('/', [HomeController::class, 'index']);

// Halaman Products (Menggunakan route prefix)
Route::prefix('category')->group(function () {
    Route::get('/food-beverage', [ProductController::class, 'foodBeverage']);
    Route::get('/beauty-health', [ProductController::class, 'beautyHealth']);
    Route::get('/home-care', [ProductController::class, 'homeCare']);
    Route::get('/baby-kid', [ProductController::class, 'babyKid']);
});

// Halaman User (Menggunakan route parameter)
Route::get('/user/{id}/name/{name}', [UserController::class, 'show']);

// Halaman Penjualan (POS)
Route::get('/transaction', [TransactionController::class, 'index']);
