<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ExternalApiAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Get endpoint
        $endpoint = "";
        $data = [];
        if ( $request->has('from') ) {
            if( $request->from == 'admin' ) {
                $endpoint = "/admin-login";

                $data = [
                    'email' => $request->input('email'),
                    'password' => $request->input('password'),
                    'from' => $request->input('from'),
                ];
            }
                
            if( $request->from == 'customer' ) {
                $endpoint = "/customer/login";

                $data = [
                    'email' => $request->input('email'),
                    'password' => $request->input('password'),
                    'from' => $request->input('from'),
                ];
            }
                
            if( $request->from == 'guardian' ) {
                $endpoint = "/auth-login1";

                $data = [
                    'phone' => $request->input('phone'),
                    'password' => $request->input('password'),
                    'from' => $request->input('from'),
                ];
            }
        }
        
        // Make a request to the external API to get the token
        $response = post(config('services.api_url').$endpoint, $data);
        
        if( isset($response['access_token']) ) {
            // Attach the token to the request for later use
            $request->merge(['api_token' => $response['access_token']]);
            $request->merge(['data' => $response]);
        }

        return $next($request);
    }
}
