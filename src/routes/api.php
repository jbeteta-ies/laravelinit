<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\NoteController;


Route::apiResource('notes', NoteController::class)->only([
    'index', 'show', 'store', 'update', 'destroy'
]);

