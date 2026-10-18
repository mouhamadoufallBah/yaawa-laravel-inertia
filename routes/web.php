<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/market', [ProductController::class, 'market'])->name('market');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.detail');
