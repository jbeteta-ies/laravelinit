<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Notes;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/notes', function() {
    return view('notes');
})->name('notes');
