<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(!Auth::check()){
            return redirect('/');
        }

        $user = Auth::user();

        if($user->role ==1){
            return $next($request);
        }

        if($user->role ==2){
            return redirect('/doctor');
        }

        if($user->role ==3){
            return redirect('/intern');
        }

        if($user->role ==4){
            Auth::logout();
            abort(403, 'Unauthorized action.');
        }
    }
}
