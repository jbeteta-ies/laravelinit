<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

Route::get('/users', [
    UserController::class,
    'index'
    ])->name('users.index');

Route::get('/roles', [
    RoleController::class,
    'index'
    ])->name('roles.index');