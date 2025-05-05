<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function createUser(UserRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'status' => 'true',
            'message' => 'Usuario creado correctamente',
            'token' => $user->createToken('api-token')->plainTextToken
        ], 200);
    }


    public function loginUser(LoginUserRequest $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return response()->json([
                'status' => 'false',
                'message' => 'Credenciales incorrectas',
            ], 401);
        }

        $user = User::where('email', $request->email)->first();
        return response()->json([
            'status' => 'true',
            'message' => 'Usuario logueado correctamente',
            'token' => $user->createToken('api-token')->plainTextToken,
        ], 200);
    }
}
