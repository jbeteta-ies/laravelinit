<?php

use Illuminate\Console\View\Components\Secret;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SecretController;
use App\Http\Controllers\AuthController;

Route::middleware('ejemplo')->group(function () {
    Route::get('/secret', [SecretController::class, 'index'])
    ->name('secret.index');
    Route::get('/secret2', [SecretController::class, 'index'])
        ->name('secret2.index');
        Route::get('/no-access', [SecretController::class, 'noAccess'])
        ->name('no-access.index')->withoutMiddleware('ejemplo');
});

/*
Route::get('/test', function () {
    return response()->json(['message' => 'Hello World']);
})->name('test');

Route::post('/create', [AuthController::class, 'createUser'])
    ->name('register');

Route::post('/login', [AuthController::class, 'loginUser'])
    ->name('login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })->name('user');

    */

/*
Route::post('/create', [AuthController::class, 'createUser'])
    ->name('register');
Route::post('/login', [AuthController::class, 'loginUser'])
    ->name('login');
Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })->name('user');

*/