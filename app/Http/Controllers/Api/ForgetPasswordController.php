<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use App\Models\User;
use App\Models\UserOtp;
use Notification;
use App\Notifications\PasswordForgetOtpNotification;
use Illuminate\Support\Facades\Hash;

class ForgetPasswordController extends Controller
{
    
    public function ForgetPassword(Request $request){

        $loginField = $request->input('username');
        $loginType = filter_var($loginField, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';

        if($loginType =="email"){
            return $this->sendOtpInMail($loginField);
        }

        $credentials = $request->only('username');
        $validator = Validator::make($credentials, [
            'username' => 'required|digits_between:10,12|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status_code' => 403,
                'message' => $validator->messages()->first(),
                'data' => []
            ],200);
        }

        $phoneNumber = $request->input('username');
        $countryCode = '91';
        $fullPhoneNumber = '+' . $countryCode . $phoneNumber;
        $user = User::where('mobile_no', $fullPhoneNumber)->get()->first();

        if(!empty($user)){

            /* Generate An OTP */
            $userOtp = $this->generateOtp($fullPhoneNumber);
            $userOtp->sendForgetPasswordLink($fullPhoneNumber);

            return response()->json([
                'status_code' => 200,
                'message' => 'Send password forget otp check inbox message',
                'data' =>[],
            ],200);


        }else{
            return response()->json([
                'status_code' => 404,
                'message' => 'Your given mobile no is not exist',
                'data' => [],
            ], 404);
        }
        

    }

    // User get otp in mobile
    public function sendOtpInMail($email){
        $user = User::where('email', $email)->first();

        if(!empty($user)){

        $userOtp = UserOtp::where('user_id', $user->id)->latest()->first();
        $now = now();
        $otp = rand(123456, 999999);
        if($userOtp && $now->isBefore($userOtp->expire_at)){
        $otp = $userOtp->otp;
        }else{
        UserOtp::create([
            'user_id' => $user->id,
            'otp' => $otp,
            'expire_at' => $now->addMinutes(10)
        ]);

        }

        $userData = [
            'name' =>$user->name,
            'body' =>'Here is your forget password verification otp',
            'thanks' =>'Thank you',
            'otp'=> $otp,
            'email' =>$user->email,
        ];

        if(!empty($user->email)){
            Notification::send($user, new PasswordForgetOtpNotification($userData));
        }

        return response()->json([
            'status_code' => 200,
            'message' => 'Send password forget otp in your gmail',
            'data' =>[],
        ],200);

        }else{
            return response()->json([
                'status_code' => 404,
                'message' => 'Yor given email is not exist',
                'data' => [],
            ], 404);
        }


    }



    
    // Mobile user Login otp
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

    public function varifyPasswordOtp(Request $request){

        $validator = Validator::make($request->all(), [
            'otp' => 'required|min:6|same:otp',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status_code' => 403,
                'message' => $validator->messages()->first(),
                'data' => []
            ],200);
        }

        /* Validation Logic */
        $userOtp   = UserOtp::where('otp', $request->input('otp'))->first();
        $now = now();
        if (!$userOtp) {
            return response()->json([
            'status_code' => 404,
            'message' => 'Your OTP is not correct',
            'data' =>[],
        ], 500);

        }else if($userOtp && $now->isAfter($userOtp->expire_at)){

            return response()->json([
                'status_code' => 419,
                'message' => 'Your OTP has been expired',
                'data' =>[],
            ], 419);
        }
    
        $user = User::whereId($userOtp->user_id)->first();

        if($user){
            //$userOtp->update(['expire_at' => now() ]);
            $userOtp->delete();
            //$token = JWTAuth::fromUser($user);
            $user = User::find($user->id);
            $user->password = bcrypt($request->input('password'));
            $user->save();
            
            return response()->json([
                'status_code' => 200,
                'message' => 'Successfully updated your password',
                'data' =>[],
            ],200);

        }
    }

    public function chagePassword(Request $request){

        try {
            $token = $request->bearerToken();
            $user = JWTAuth::authenticate($token);
            
            $validator = Validator::make($request->all(), [
                'current_password' => 'required',
                'new_password' => 'required|min:6|confirmed',
                'new_password_confirmation' => 'required|min:6',
            ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'status_code' => 403,
                    'message' => $validator->messages()->first(),
                    'data' => []
                ],200);
            }
    
            if (!Hash::check($request->current_password, $user->password)){
                return response()->json([
                    'status_code' => 403,
                    'message' =>'The current password is incorrect',
                    'data' => []
                ],200);
            }

            $user->update([
                'password' => Hash::make($request->new_password),
            ]);
            return response()->json([
                'status_code' => 200,
                'message' => 'Successfully updated your new password',
                'data' =>[],
            ],200);
    
        } catch (\Throwable $th) {
            return response()->json(['status_code' => 500,'message' => 'something went to wrong'], 500);
        }

       
       
    }

}
