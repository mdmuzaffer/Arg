<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Validator;
use Exception;
use Auth;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class LoginSocialController extends Controller
{
    protected function _registerOrLoginUser($data){

        $user = User::where('email',$data->email)->get()->first();

          if(!$user){
             $user = new User();
             $user->name = $data->name;
             $user->email = $data->email;
             $user->provider_name = "Gmail";
             $user->provider_id = $data->id;
             $user->image = $data->avatar;
             $user->save();
             Auth::login($user);
          }else{
            Auth::login($user);
          }

        //$user = User::where('email', $data->email)->get()->first();
        //$token = JWTAuth::fromUser($user);
    }

    //Google Login
    public function redirectToGoogle(){
        return Socialite::driver('google')->stateless()->redirect();
    }
    
    //Google callback  
    public function handleGoogleCallback(){
        $data = Socialite::driver('google')->stateless()->user();
        //$this->_registerorLoginUser($user);
        $finduser = User::where('email',$data->email)->get()->first();
        try {
            if(!$finduser){
                $user = new User();
                $user->name = $data->name;
                $user->email = $data->email;
                $user->password = bcrypt('arogyadham@123');
                $user->provider_name = "Gmail";
                $user->provider_id = $data->id;
                $user->image = $data->avatar;

                if ($user->save()) {

                    if (Auth::attempt(['email' => $data->email, 'password' => "arogyadham@123"])) {

                        Auth::login(Auth::user());
                        //$finduser = User::find($user->id);
                        //echo $token = JWTAuth::fromUser($finduser);
                        return redirect()->route('home');
                    }

                } else {
                    // There was an error saving the user
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

        //return redirect()->route('home');
    }

    //Facebook Login
    public function redirectToFacebook(){
        //return Socialite::driver('facebook')->stateless()->redirect();
        return Socialite::driver('facebook')->redirect();
    }
    
    //facebook callback  
    public function handleFacebookCallback(){

        //$user = Socialite::driver('facebook')->stateless()->user();
        $user =  Socialite::driver('facebook')->user();
       // $this->_registerorLoginUser($user);

        echo "<pre>";
        print_r($user);
        die;

       $authUser = User::where('provider_id', $user->id)->first();

        if ($authUser) {
            return $authUser;
        }

        return User::create([
            'name' => $facebookUser->name,
            'email' => $facebookUser->email,
            'provider_name' => 'facebook',
            'provider_id' => $facebookUser->id,
            'password' => bcrypt('arogyadham@123'),
        ]);

        return redirect()->route('home');
    }


}
