<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function index()
    {
        // Eager load the 'phone' relationship to avoid N+1 query problem
        // and fetch all users with their associated phone numbers
        $users = User::with('phone')->get();
        return view('users.index', compact('users'));
    }

    function showPhone($phone)
    {
        // Find the user by phone number
        $phone = Phone::where('number', $phone)->first();
        if (!$phone) {
            return redirect()->route('users.index')->with('error', 'Phone number not found.');
        } else {
            $user = $phone->user;
            if (!$user) {
                return redirect()->route('users.index')->with('error', 'User not found.');
            } else {
                // Return the user details view
                return view('users.show', compact('user'));
            }
        }
    }

}
