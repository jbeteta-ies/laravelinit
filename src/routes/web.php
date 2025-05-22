<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::view('/', 'landing.index')->name('landing');
Route::view('/contact', 'landing.contact')->name('contact');

Route::get('lang/{locale}', function ($locale, Request $request) {
        $available = ['en', 'es', 'val'];
        if (in_array($locale, $available)) {
            $request->session()->put('locale', $locale);
        }
        return redirect()->back();
    })->name('lang.switch');


Route::get('/test', function (Request $request) {
    return "Locale en sesión: " . $request->session()->get('locale', 'no seteado');
});