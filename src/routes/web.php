<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/phone/{phone}', [UserController::class, 'showPhone'])->name('users.showPhone');

Route::get('/', function () {
    return view('welcome');
});
