<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\UserLog;
use Carbon\Carbon;
use Auth;
use GeoIp2\Database\Reader;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    protected function login(Request $request){

        $credentials = $request->validate([
            'email' =>'required|email',
            'password' =>'required',
        ]);

        if(Auth::attempt($credentials)){
            $user = Auth::user()->role;


        $ipAddress = $request->ip();
        //$ipAddress = "122.173.31.242";

        $databasePath = storage_path('app/GeoLite2-City.mmdb');
        $reader = new Reader($databasePath);

        $location = "";

        try {
            $record = $reader->city($ipAddress);
            
            $city = $record->city->name ?? 'Unknown';
            $country = $record->country->name ?? 'Unknown';

            $location = $city . ', ' . $country;
        } catch (\Exception $e) {
            \Log::error('Error fetching location: ' . $e->getMessage());

            $location = 'Unknown';
        }


        // If automatically logout 
        $autologout = UserLog::where([
            'user_id' => Auth::user()->id,
            'platform' => $request->header('User-Agent'),
            'ip' => $request->ip(),
        ])->whereNull('logout_date')->get()->first();

        if($autologout) {
            $login_time = $autologout->login_date;
            $duration = Carbon::now()->diffInSeconds($login_time, true);
            $autologout->update(['logout_date' =>  NOW(), 'duration' => $duration]);
        }

        UserLog::create([
            'user_id' => Auth::user()->id,
            'platform' => $request->header('User-Agent')?? 'Browser',
            'ip' => $ipAddress,
            'location' => $location,
            'login_date' => NOW(),
        ]);


        switch($user){
            case 1:
                return redirect('/dashboard');
                break;
            case 2:
                return redirect('/doctor');
                break;
            case 3:
                return redirect('/intern');
                break;
            default:
            return redirect('/login')->with('error','Oops something went to wrong');
         }

        }else{
           
            return back()->with('error','Oops something went to wrong');
        }
    }




    public function logout(Request $request){

            /* logout time */
           $logout = UserLog::where([
                'user_id' => Auth::user()->id,
                'platform' => $request->header('User-Agent'),
                'ip' => $request->ip(),

            ])->whereNull('logout_date')->get()->first();

            if($logout) {

                $login_time = $logout->login_date;

                $duration = Carbon::now()->diffInSeconds($login_time, true);

                $logout->update(['logout_date' =>  NOW(), 'duration' => $duration]);

            }

        Auth::logout();
        return redirect('/login')->with('success', 'You have been logged out.');
    }



}
