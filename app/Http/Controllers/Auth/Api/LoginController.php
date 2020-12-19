<?php

namespace App\Http\Controllers\Auth\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(Request $request): JsonResponse
    {
        $input = $request->only('email', 'password');
        if ($token = $this->guard()->attempt($input)) {
            return response()->json([
                'token' => $token,
                'token_type' => 'bearer',
                'expires_in' => $this->guard()->factory()->getTTL() * 60
            ]);
        }
        return response()->json(['error' => 'Unauthorized']);
    }

    private function guard()
    {
        return Auth::guard();
    }
}
