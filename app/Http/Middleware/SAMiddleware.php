<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SAMiddleware
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
        if (!Auth::guest()) {
            $user = Auth::user();

            if($user->role->name == 'superadmin') {
                $prefix = getPrefixByRole($user->role->name);

                $request->server->set('REQUEST_URI', '/' . $prefix . $request->server->get('REQUEST_URI'));

                return $next($request);
            }
        }

        $urlLogin = route('login');

        return redirect()->guest($urlLogin);
    }
}
