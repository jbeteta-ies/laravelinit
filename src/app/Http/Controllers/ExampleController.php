<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    function index()
    {
        $user = auth()->user();
        return view('example.index', compact('user'));
    }
}
