<?php

namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
  
class FacebookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
           
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    {

        $data = Socialite::driver('facebook')->user();
        $finduser = User::where('provider_id', $data->id)->first();

        try {
            if(!$finduser){
                $user = new User();
                $user->name = $data->name;
                $user->email = $data->email;
                $user->password = bcrypt('arogyadham@123');
                $user->provider_name = "Facebook";
                $user->provider_id = $data->id;
                $user->image = $data->avatar;

                if ($user->save()) {

                    if (Auth::attempt(['provider_id' => $data->id, 'password' => "arogyadham@123"])) {
                        Auth::login(Auth::user());
                        return redirect()->route('home');
                    }

                } else {
                    echo 'Error saving user';
                }


            }else{
            Auth::login($finduser, true);
             //echo $token = JWTAuth::fromUser($finduser);
            return redirect()->intended('home');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }

    }

  
}