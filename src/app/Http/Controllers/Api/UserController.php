<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    function index(Request $request): JsonResponse
    {
        // You can use the User model to fetch users from the database
        // For example:
        // $users = User::all();
        
        // Return a JSON response with the users
        {
            return response()->json(UserResource::collection(
                User::with('phones')->get()
            ));
        };
    }   
}
