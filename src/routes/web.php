<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'landing.index')->name('landing.index');
Route::view('/about', 'landing.about')->name('landing.about');


