<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use App\Models\User;
use App\Models\Role;
use App\Models\UserOtp;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Notification;
use App\Notifications\WelcomeNotification;
use Twilio\Rest\Client;

use DB;

class WhatsAppController extends Controller
{
    
    public function whatsappAuthenticate(Request $request){

        $credentials = $request->only('mobile_no');
        $validator = Validator::make($credentials, [
            'mobile_no' => 'required|digits_between:10,12|numeric|unique:users'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status_code' => 403,
                'message' => $validator->messages()->first(),
                'data' => []
            ],200);
        }

        try {

            $phoneNumber = $request->input('mobile_no');
            $countryCode = '91';
            $fullPhoneNumber = '+' . $countryCode . $phoneNumber;

            $user = User::where('mobile_no', $fullPhoneNumber)->get()->first();


            if (!$user) {
                $user = User::create([
                    'password' => bcrypt('arogyadhama@123'),
                    'mobile_no' => $fullPhoneNumber,
                    'role' => 4,
                ]);
                $role = Role::where('role_name','Patient')->first();
                $user->roles()->attach($role);
                $token = JWTAuth::fromUser($user);

                /* Generate An OTP */
                $userOtp = $this->generateOtp($fullPhoneNumber);
                $userOtp->sendOTPinWhatsapp($fullPhoneNumber);

                return response()->json([
                    'status_code' => 200,
                    'message' => 'User created successfully and send otp in your whatsapp mobile no',
                    'data' =>[],
                ],200);
            }else{

                $token = JWTAuth::fromUser($user);
                $userOtp = $this->generateOtp($fullPhoneNumber);
                $userOtp->sendOTPinWhatsapp($fullPhoneNumber);
                return response()->json([
                    'status_code' => 200,
                    'message' => 'Send otp in your whatsapp no',
                    'data' =>[],
                ],200);
            }
        } catch (JWTException $e) {
    	return $credentials;
            return response()->json(['status_code' => 500,'message' => 'Could not created user.'], 500);
        }


    }

    // Create OTP

    public function generateOtp($mobile_no)
    {

        $user = User::where('mobile_no', $mobile_no)->first();
  
        /* User Does not Have Any Existing OTP */
        $userOtp = UserOtp::where('user_id', $user->id)->latest()->first();
        $now = now();
        if($userOtp && $now->isBefore($userOtp->expire_at)){
            return $userOtp;
        }
  
        /* Create a New OTP */
        return UserOtp::create([
            'user_id' => $user->id,
            'otp' => rand(123456, 999999),
            'expire_at' => $now->addMinutes(10)
        ]);
    }


}
