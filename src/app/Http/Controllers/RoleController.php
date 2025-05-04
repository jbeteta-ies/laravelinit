<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Role;

class RoleController extends Controller
{
    function index(): View
    {
        $roles = Role::with('users')->get();
        return view('roles.index', compact('roles'));
    }
}
