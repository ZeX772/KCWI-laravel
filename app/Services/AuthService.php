<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Class AuthService.
 */
class AuthService
{
    /**
     * Process the JWTAuth with the credentials, can be used through api and web route
     * 
     * @return Array
     */
    public function login( $credentials, $remember = false )
    {
        $token = null;

        if( Auth::attempt($credentials, $remember) ) {
            $user = Auth::user();
        
            // Generate a JWT token
            $token = JWTAuth::fromUser($user);
        }

        return [
            'token' => $token,
            'error' => $token ? false : true
        ];
    }

    public function getRouteByRole( $role )
    {
        return config('routebyrole.' . $role);
    }

    public function getUserToken(User $user)
    {
        return JWTAuth::fromUser($user);
    }
}
