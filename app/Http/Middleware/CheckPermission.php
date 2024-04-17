<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $permission)
    {
        $hasPermission = false;
        foreach (session('user.role.permissions') as $key => $userPermission) {
            if( $userPermission['table_name'] == $permission ) {
                $hasPermission = true;

                break;
            }
        }
        
        if (! $hasPermission ) {
            // User does not have the required permission
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
