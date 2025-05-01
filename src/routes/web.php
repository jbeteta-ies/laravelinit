<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return redirect()->route('products.index');
})->name('home');

Route::get('/products', [
    \App\Http\Controllers\ProductController::class,
    'index'
])->name('products.index');

