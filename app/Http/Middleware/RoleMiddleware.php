<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role, $permission=null): Response
    {
         if(!$request->user()->hasRole($role)){

            Auth::logout();
            abort(403, 'Unauthorized action.');

        }
        
        if($permission != null && !$request->user->can($permission)){
            abort(403, 'Unauthorized action.');
        }
        
        return $next($request);
    }
}
