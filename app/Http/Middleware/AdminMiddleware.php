<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( $this->isTokenExpired() ) {
            session()->forget([
                'api_token', 
                'api_token_expires_at',
                'user',
                // 'school'
            ]);
        }

        // * Validate if the user is customer or admin
        $urlLogin = "";
        if( session('user') ) {
            if( isCms() ) {
                $urlLogin = route('wave.home');

                return redirect()->guest($urlLogin);
            }
        }

        if( session('api_token') )
            return $next($request);

        $urlLogin = route('wave.user.admin-panel.index');

        return redirect()->guest($urlLogin);
    }

    protected function isTokenExpired()
    {
        // Check expiration
        if ( session('api_token_expires_at') < time() )
            return true;

        return false;
    }
}
