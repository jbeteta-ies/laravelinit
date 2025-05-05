<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ExampleRequest;

class SecretController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'true',
            'message' => 'Acceso permitido'
        ]);
    }

    public function noAccess()
    {
        return response()->json([
            'status' => 'false',
            'message' => 'Acceso denegado'
        ], 403);
    }
}
