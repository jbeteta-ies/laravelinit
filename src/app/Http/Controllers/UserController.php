<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;

class UserController extends Controller
{
    function index(): View
    {
        $users  = User::with('roles')->get();
        return view('users.index', compact('users'));
    }
}
