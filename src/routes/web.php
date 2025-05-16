<?php

use App\Models\File;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'landing.index')->name('landing.index');


Route::get('/myfiles', [FileController::class, 'index'])->name('files.index');
Route::get('/myfiles/create', [FileController::class, 'create'])->name('files.create');
Route::post('/myfiles', [FileController::class, 'store'])->name('files.store');
Route::get('/myfiles/download/{id}', [FileController::class, 'download'])->name('files.download');
Route::delete('/myfiles/{id}', [FileController::class, 'destroy'])->name('files.destroy');


