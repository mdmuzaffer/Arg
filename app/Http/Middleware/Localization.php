<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserDetail;
use Tymon\JWTAuth\Facades\JWTAuth;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Check header request and determine localizaton
        
        /*
        $userId = null;
        if ($token = JWTAuth::getToken()) {
            $payload = JWTAuth::getPayload($token);
            $userId = $payload->get('sub'); // Assuming the user ID is stored as 'sub' claim
        }
        echo $userId;*/


        //$local = ($request->hasHeader('X-localization')) ? $request->header('X-localization') : 'en';
        //app()->setLocale($local);

        if ($request->is('api/*')) {
            $local = ($request->hasHeader('X-localization')) ? $request->header('X-localization') : 'en';
            app()->setLocale($local);
        }
        

        if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        }


        return $next($request);
    }
}
