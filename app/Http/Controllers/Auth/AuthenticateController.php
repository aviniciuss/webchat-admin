<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthenticateController
{
    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = $this->model->where('email', $credentials['email'])->first(['name', 'email', 'avatar']);

        try {
            if (! $token = JWTAuth::attempt($credentials)) {

                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(['token' => $token, 'user' => $user]);
    }
}