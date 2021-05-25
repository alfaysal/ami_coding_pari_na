<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{

	
	// Check if the credential is matched 
    public function login(Request $request)
    {
    	$credentials = $request->only('email', 'password');

        if ($token = Auth::attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Hey there .You Are Unauthorized'], 401);

    }

    // Returns the token format 
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ]);
    }

    // for logging out a authenticated user 
    public function logout()
    {
        Auth::logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    // For refreshing the token 
     public function refresh()
    {
        return $this->respondWithToken(Auth::refresh());
    }
}
