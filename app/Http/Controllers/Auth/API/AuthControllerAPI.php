<?php

namespace App\Http\Controllers\Auth\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthControllerAPI extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->all(['email','password']);
         
        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function logout()
    {
        auth('api')->logout();

        return response()->json(['msg' => 'Você foi deslogado!']);
        
    }

    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    public function me()
    {
        return response()->json(auth('api')->user());
    }
}
