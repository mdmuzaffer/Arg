<?php

//namespace App\Http\Controllers;
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use JWTAuth;
use App\Models\User;
use App\Models\Role;
use App\Models\UserOtp;
use App\Models\PatientProfile;
use App\Models\Department;
use App\Models\UserDeviceToken;
use App\Models\State;
use App\Models\Language;
use App\Models\Accommodation;
use App\Models\Payment;
use App\Models\Slider;
use App\Models\Section;
use App\Models\UserSectionsMaping;
use App\Models\Country;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Notification;
use App\Notifications\WelcomeNotification;
use Image;
use File;
use DB;
use App\Models\UserLog;
use GeoIp2\Database\Reader;
use Carbon\Carbon;

class ApiController extends Controller
{
    public function register(Request $request)
    {

        $credentials = ['email' => $request->input('email'), 'password' => $request->input('password')];
        $validator = Validator::make($request->all(), [
                'email'=> 'required|email',
                'password' => 'required|min:6'
            ]);

        //Send failed response if request is not valid

        if ($validator->fails()) {
            return response()->json([
                'status_code' => 403,
                	'message' => $validator->messages()->first(),
                    'data' => []
            ],200);
        }

      $checkUser = User::where('email', $request->input('email'))->get()->first();

        if(!empty($checkUser)){

            try {
                if (! $token = JWTAuth::attempt($credentials)) {
                    return response()->json([
                        'status_code' => 403,
                        'message' => 'Login credentials are invalid.',
                        'data' => []
                    ], 403);
                }
            } catch (JWTException $e) {
                return response()->json([
                        'status_code' => 500,
                        'message' => 'Could not create token.',
                        'data' => []
                    ], 500);
            }

            //Token created, return with success response and jwt token
            $users = User::with('userDetails')->find($checkUser->id);
           
            if(!empty($users->userDetails)){

                $language = [
                    'title' => trans('apilang.title'),
                    'description' => trans('apilang.description'),
                    'message' => trans('apilang.message'),
                    'content' => trans('apilang.content'),
                  ];
                  

                if($users->profile_complete =='1' && $users->is_active =='1'){

                    if($users->userDetails->department_status !=='1'){

                        $userdata = User::with(['userDetails.department','userDetails.state','userDetails.language','userDetails.accommodation'])->find($users->id);

                        $msgofdepartment = $users->userDetails->section_status =='0'? 'Under review your department':'Your department decline';
                        return response()->json([
                            'status_code' => 200,
                            'message' => $msgofdepartment,
                            'data' =>$userdata,
                            'token' =>$token,
                            ],200);
                    }

                   $userdata = User::with(['userDetails.department','userDetails.state','userDetails.language','userDetails.accommodation','userDetails','sectionMaping.section'])->find($users->id);
                    return response()->json([
                        'status_code' => 200,
                        'message' => 'Your profile updated successfully',
                        'data' =>$userdata,
                        'token' =>$token,
                        ],200);
                }else{
                
                $userdata = User::with(['userDetails.department','userDetails.state','userDetails.language','userDetails.accommodation','payment'])->find($users->id);
                return response()->json([
                    'status_code' => 200,
                    'message' => 'You are inactive',
                    'other_message' => 'Please wait for the confirmation',
                    'data' =>$userdata,
                    'token' =>$token,
                    ],200);
                }

            }else{

                return response()->json([
                    'status_code' => 200,
                    'message' =>'Please profile update',
                    'data' => $users,
                    'token' => $token,
                ],200);

            }
        }

        $user = User::create([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' =>4,
            'profile_complete' =>'0'
        ]);

        $role = Role::where('role_name','Patient')->first();
        $user->roles()->attach($role);

        $deviceToken ="";
        $deviceType ="";
        if($request->has('device_token') || $request->has('device_type')){
            $deviceToken = $request->input('device_token');
            $deviceType = $request->input('device_type');
            $userdeviceToken = new UserDeviceToken;
            $userdeviceToken->user_id = $user->id;
            $userdeviceToken->device_type = $deviceType;
            $userdeviceToken->device_token = $deviceToken;
            $userdeviceToken->version = "";
            $userdeviceToken->device_name = $deviceType;
            $userdeviceToken->save();
        }


        // if($user && $user->email){
        //     $userData = [
        //         'name' =>$user->name,
        //         'body' =>'Welcome to register in arogyadham',
        //         'thanks' =>'Thank you',
        //         'websiteUrl'=> url('/'),
        //         'email' =>$user->email,
        //     ];
        //     if(!empty($user->email)){
        //         Notification::send($user, new WelcomeNotification($userData));
        //     }
        // }


        //User created, return success response
        return response()->json([
            'status_code' => 200,
            'message' => 'User created successfully',
            'data' => $user,
            'token' =>JWTAuth::attempt($credentials)
        ],200);
    }

 
    public function authenticate(Request $request)
    {
        //$credentials = $request->only('email', 'password');

        $loginField = $request->input('username');
        $loginType = filter_var($loginField, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile_no';
        $loginField = ($loginType == "mobile_no") ? '+91'.$loginField : $loginField;
        $credentials = [$loginType => $loginField, 'password' => $request->input('password')];
        $valid  = ($loginType == 'email') ? 'required|email' : 'required|numeric';

        //valid credential
        $validator = Validator::make($credentials, [
            $loginType => $valid,
            'password' => 'required'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json([
                'status_code' => 403,
                	'message' => $validator->messages()->first(),
                    'data' => []
            ],200);
                
        }

        //Request is validated
        //Crean token

        $credentials1 = ['email' => $loginField, 'password' => $request->input('password')];

        try {
            if (! $token = JWTAuth::attempt($credentials1)) {
                $user = JWTAuth::authenticate($token);
                return response()->json([
                	'status_code' => 403,
                	'message' => 'Login credentials are invalid.',
                    'data' => []
                ], 403);
            }
        } catch (JWTException $e) {
    	//return $credentials;
            return response()->json([
                	'status_code' => 500,
                	'message' => 'Could not create token.',
                    'data' => []
                ], 500);
        }

 		//Token created, return with success response and jwt token
        return response()->json([
            'status_code' => 200,
            'token' => $token,
        ],200);
    }
 
    public function logout(Request $request)
    {
		//Request is validated, do logout        
        try {

            $token = $request->bearerToken();
            $user = JWTAuth::authenticate($token);

            //$request->input('ip');

            /* logout time */
           $logout = UserLog::where([
            'user_id' => $user->id,
            'platform' => $request->header('User-Agent'),
            //'ip' => $request->input('ip'),

        ])->whereNull('logout_date')->get()->first();

        if($logout) {
            $login_time = $logout->login_date;
            $duration = Carbon::now()->diffInSeconds($login_time, true);
            $logout->update(['logout_date' =>  NOW(), 'duration' => $duration]);
        }


            JWTAuth::invalidate($token);

            return response()->json([
                'status_code' => 200,
                'message' => 'User has been logged out',
                'data' =>[],
            ],200);
        } catch (JWTException $exception) {
            return response()->json([
                'status_code' => 500,
                'message' => 'Sorry, user cannot be logged out',
                'data' => []
            ], 500);
        }
    }

 
    public function get_user(Request $request)
    {
        $token = $request->bearerToken();
        $user = JWTAuth::authenticate($token);
 
        return response()->json(['user' => $user]);
    }

    public function mobileAuthenticate(Request $request){

        $credentials = $request->only('mobile_no');
        $validator = Validator::make($credentials, [
            'mobile_no' => 'required|string|regex:/^\+[0-9\s]{10,12}$/'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status_code' => 403,
                'message' => $validator->messages()->first(),
                'data' => []
            ],200);
        }

        try {

            $fullPhoneNumber = $request->input('mobile_no');
            $user = User::where('mobile_no', $fullPhoneNumber)->get()->first();

            if (!$user){
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
                // Send OTP in inbox mobile
                //$userOtp->sendSMS($fullPhoneNumber); //this code commented for now due to amount spend
                // send OTP in whatsapp
                //$userOtp->sendOTPinWhatsapp($fullPhoneNumber); //this code commented for now due to amount spend

                $deviceToken ="";
                $deviceType ="";
                if($request->has('device_token') || $request->has('device_type')){
                    $deviceToken = $request->input('device_token');
                    $deviceType = $request->input('device_type');
                    $userdeviceToken = new UserDeviceToken;
                    $userdeviceToken->user_id = $user->id;
                    $userdeviceToken->device_type = $deviceType;
                    $userdeviceToken->device_token = $deviceToken;
                    $userdeviceToken->version = "";
                    $userdeviceToken->device_name = $deviceType;
                    $userdeviceToken->save();
                }


                return response()->json([
                    'status_code' => 200,
                    'message' => 'Send otp in your mobile no',
                    'data' =>[],
                ],200);
            }else{

                $token = JWTAuth::fromUser($user);
                $userOtp = $this->generateOtp($fullPhoneNumber);
                //$userOtp->sendSMS($fullPhoneNumber);   //this code commented for now due to amount spend
                //$userOtp->sendOTPinWhatsapp($fullPhoneNumber);  //this code commented for now due to amount spend
                return response()->json([
                    'status_code' => 200,
                    'message' => 'Send otp in your register mobile no',
                    'data' =>[],
                ],200);
            }
        } catch (JWTException $e){
    	return $credentials;
            return response()->json(['status_code' => 500,'message' => 'Could not created user.'], 500);
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
            //'otp' => rand(12345, 99999),
            'otp' => 12345,
            'expire_at' => $now->addMinutes(10)
        ]);
    }


    public function loginWithMobileOtp(Request $request)
    {
        $request->input('otp');

        $request->validate([
            'otp' => 'required'
        ]);  
  
        /* Validation Logic */
        //$userOtp = UserOtp::where('otp', $request->input('otp'))->first();
        $userOtp = UserOtp::where('otp', $request->input('otp'))->latest('created_at')->first();
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
            $userOtp->update([
                'expire_at' => now()
            ]);

            $checkUser = User::where('mobile_no', $user->mobile_no)->first();
            $credentials = ['mobile_no'=>$user->mobile_no, 'password' => "arogyadhama@123"];

            if(!empty($checkUser)){
        
                try {

                    if (! $token = JWTAuth::attempt($credentials)) {
                        return response()->json([
                            'status_code' => 403,
                            'message' => 'Login credentials are invalid.',
                            'data' => []
                        ], 403);
                    }
                } catch (JWTException $e) {
                    return response()->json([
                            'status_code' => 500,
                            'message' => 'Could not create token.',
                            'data' => []
                        ], 500);
                }
    
                //Token created, return with success response and jwt token

                $users = User::with('userDetails')->find($checkUser->id);
                $defaultLang = Language::select('id','name','shortname')->where('shortname', 'en')->first();
                $otplang = $users->userDetails->language ?? ($defaultLang ? $defaultLang : 'en');                
               
                if(!empty($users->userDetails)){
    
                    if($users->profile_complete =='1' && $users->is_active =='1'){
    
                        if($users->sectionMaping->status !=='1'){
    
                            $userdata = User::with(['userDetails.country','userDetails.language','userDetails.accommodation','sectionMaping.section'])->find($users->id);
    
                            $msgofdepartment = $users->userDetails->department_status =='0'? 'Under review your department':'Your department decline';
                            return response()->json([
                                'status_code' => 200,
                                'message' => $msgofdepartment,
                                'data' =>$userdata,
                                'token' =>$token,
                                ],200);
                        }
    
                       $userdata = User::with(['userDetails.country','userDetails.language','userDetails.accommodation','sectionMaping.section'])->find($users->id);
                        return response()->json([
                            'status_code' => 200,
                            'message' => 'Your profile updated successfully',
                            'data' =>$userdata,
                            'token' =>$token,
                            ],200);
                    }else{
                    
                    $userdata = User::with(['userDetails.country','userDetails.language','userDetails.accommodation','sectionMaping.section','payment'])->find($users->id);
                    return response()->json([
                        'status_code' => 200,
                        'message' => 'You are inactive',
                        'other_message' => 'Please wait for the confirmation',
                        'data' =>$userdata,
                        'token' =>$token,
                        ],200);
                    }
    
                }else{
    

                    $users['language'] = $otplang;
                    return response()->json([
                        'status_code' => 200,
                        'message' =>'Please profile update',
                        'data' => $users,
                        'token' => $token,
                    ],200);
    
                }
            }

            //Auth::login($user);
            //return redirect('/home');
            $token = JWTAuth::fromUser($user);
            return response()->json([
                'status_code' => 200,
                'message' => 'User created successfully',
                'data' => $user,
                'token' => $token,
            ],200);
            

        }

        return response()->json([
            'status_code' => 401,
            'message' => 'Your OTP is not correct',
            'data' =>[],
        ],401);

    }

    // profile update 
    public function profileUpdate(Request $request){
        
        $token = $request->bearerToken();
        $user = JWTAuth::authenticate($token);
        //Validation
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string',
            'age' => 'required',
            'gender' => 'required',
            'mobile'=> 'required|string|regex:/^\+[0-9]{10,14}$/',
            'whats_no' => 'required|string|regex:/^\+[0-9]{10,14}$/',
            'email'=> 'required|email|unique:users,email',
            'address'=> 'required',
            'address2'=> 'required',
            'city'=> 'required',
            'state'=> 'required',
            'pincode'=> 'required',
            'country'=> 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'language_id'=> 'required',
            'section_id'=> 'required',
            'accomudation_id'=> 'required',
        ]);

    if ($validator->fails()) {
        return response()->json([
            'status_code' => 403,
                'message' => $validator->messages()->first(),
                'data' => []
        ],403);
    }

        $image = $request->file('image');
        $imageName = time().'.'.$request->image->extension(); 
        $path_img = "images/profile/".$imageName;
        Image::make($image)->resize('100','100')->save($path_img);

        $userDetail = PatientProfile::where('user_id',$user->id)->get()->first();

        $fullPhoneNumber = $request->input('mobile');
        $fullwhatNumber = $request->input('whats_no');

        $userMobileExist = User::where('mobile_no', $fullPhoneNumber)->where('id', '<>', $user->id)->count();

        if($userMobileExist >0){
            return response()->json([
                'status_code' => 403,
                    'message' => 'The mobile number has already been taken',
                    'data' => []
            ],403);
        }

        try {

            $deviceToken ="";
            $deviceType ="";
            if($request->has('device_token') || $request->has('device_type')){
                $deviceToken = $request->input('device_token');
                $deviceType = $request->input('device_type');
            }

            if(!empty($userDetail)){

                try {
                    $userDetail = PatientProfile::find($userDetail->id);
                    $userDetail->user_id  = $user->id;
                    $userDetail->full_name = $request->input('full_name');
                    $userDetail->age = $request->input('age');
                    $userDetail->gender = $request->input('gender');
                    $userDetail->mobile = $fullPhoneNumber;
                    $userDetail->whats_no = $fullwhatNumber;
                    $userDetail->email = $request->input('email');
                    $userDetail->address = $request->input('address');
                    $userDetail->address2 = $request->input('address2');
                    $userDetail->city = $request->input('city');
                    $userDetail->state = $request->input('state');
                    $userDetail->pincode = $request->input('pincode');
                    $userDetail->country_id = $request->input('country');
                    $userDetail->profile_photo = $path_img;

                    $userDetail->language_id = $request->input('language_id');
                    //$userDetail->department_id = $request->input('department_id')? $request->input('department_id'):1;
                    //$userDetail->section_id = $request->input('section_id');
                    $userDetail->accomudation_id = $request->input('accomudation_id');
                    //$userDetail->section_status = '0';
                    $userDetail->save();
                    //User update 
                    $user = User::find($user->id);
                    $user->name = ($user->name) ? $user->name : $request->input('full_name');
                    $user->email = ($user->email) ? $user->email : $request->input('email');
                    $user->mobile_no = ($user->mobile_no) ? $user->mobile_no : $fullPhoneNumber;
                    $user->is_active ='1';
                    $user->profile_complete ='1';
                    $user->save();

                    //section update here if section not approved
                    $usersection = UserSectionsMaping::where('user_id', $user->id)
                        ->where('is_active','=','1')
                        ->where('status','!=','1')->first();

                    if($usersection){

                        $usersectionOld = UserSectionsMaping::where('user_id',$user->id)->where('is_active','1')->get();
                        foreach ($usersectionOld as $userSection) {
                            $userSection->is_active = '0';
                            $userSection->save();
                        }

                        $userSection = new UserSectionsMaping;
                        $userSection->section_id = $request->input('section_id');
                        $userSection->user_id = $user->id;
                        $userSection->is_active = '1';
                        $userSection->save();

                    }else{
                        $userSection = new UserSectionsMaping;
                        $userSection->section_id = $request->input('section_id');
                        $userSection->user_id = $user->id;
                        $userSection->is_active = '1';
                        $userSection->save();

                    }



                    if($request->has('device_token') || $request->has('device_type')){
                        $deviceToken = $request->input('device_token');
                        $deviceType = $request->input('device_type');

                        $tokenCount = DB::table('user_device_tokens')->where('user_id', $user->id)->count();

                        if($tokenCount >0){
                            DB::table('user_device_tokens')->where('user_id', $user->id)
                                ->update([
                                    'device_token' => $deviceToken,
                                    'device_type' => $deviceType,
                                    'version' =>"",
                                    'device_name' => $deviceType,
                                ]);
                        }else{
                            DB::table('user_device_tokens')
                                ->insert([
                                    'user_id' => $user->id,
                                    'device_token' => $deviceToken,
                                    'device_type' => $deviceType,
                                    'version' => '',
                                    'device_name' => $deviceType,
                                ]);
                        }
                    }
                    
                    // Welcome message to patient
                    if($user && $user->email){
                        $userData = [
                            'name' =>$user->name,
                            'body' =>'Welcome to register in arogyadham',
                            'thanks' =>'Thank you',
                            'websiteUrl'=> url('/'),
                            'email' =>$user->email,
                        ];
                        if(!empty($user->email)){
                            Notification::send($user, new WelcomeNotification($userData));
                        }
                    }

                    $users = User::with([
                        'userDetails.department',
                        'userDetails.language',
                        'userDetails.accommodation',
                        'sectionMaping.section',
                        'userDetails.country',
                        ])->find($user->id);

                    return response()->json([
                        'status_code' => 200,
                        'message' => 'Your profile updated successfully',
                        'other_message' => 'Please wait for the confirmation',
                        'data' =>$users,
                        'token' =>$token,
                    ],200);
                } catch (QueryException  $e) {

                    if ($e->errorInfo[1] == 1062) { // 1062 is the MySQL error code for duplicate entry
                        return response()->json([
                            'status_code' => 500,
                            'message' => 'error occurred duplicate saving the data',
                            'data' =>[],
                        ],500);
                    } else {
                        return response()->json([
                            'status_code' => 500,
                            'message' => 'An error occurred while saving the data',
                            'data' =>[],
                        ],500);
                    }
                }

            }else{

                $userDetail = new PatientProfile;
                $userDetail->user_id  = $user->id;
                $userDetail->full_name = $request->input('full_name');
                $userDetail->age = $request->input('age');
                $userDetail->gender = $request->input('gender');
                $userDetail->mobile = $fullPhoneNumber;
                $userDetail->whats_no = $fullwhatNumber;
                $userDetail->email = $request->input('email');
                $userDetail->address = $request->input('address');
                $userDetail->address2 = $request->input('address2');
                $userDetail->city = $request->input('city');
                $userDetail->state = $request->input('state');
                $userDetail->pincode = $request->input('pincode');
                $userDetail->country_id = $request->input('country');
                $userDetail->profile_photo = $path_img;

                $userDetail->language_id = $request->input('language_id');
                //$userDetail->department_id = $request->input('department_id') ? $request->input('department_id'):1;
                //$userDetail->section_id = $request->input('section_id');
                $userDetail->accomudation_id = $request->input('accomudation_id');
                $userDetail->save();
                //User update 
                $user = User::find($user->id);
                $user->name = ($user->name) ? $user->name : $request->input('full_name');
                $user->email = ($user->email) ? $user->email : $request->input('email');
                $user->mobile_no = ($user->mobile_no) ? $user->mobile_no : $fullPhoneNumber;
                //$user->is_active ='1';
                $user->status ='0';
                $user->profile_complete ='1';
                $user->save();
                //section added in user_sections_mapings table
                $userSection = new UserSectionsMaping;
                $userSection->section_id = $request->input('section_id');
                $userSection->user_id = $user->id;
                $userSection->is_active = '1';
                $userSection->save();

                if($request->has('device_token') || $request->has('device_type')){
                    $deviceToken = $request->input('device_token');
                    $deviceType = $request->input('device_type');
                    $tokenCount = DB::table('user_device_tokens')->where('user_id', $user->id)->count();
                    if($tokenCount >0){
                        DB::table('user_device_tokens')->where('user_id', $user->id)
                            ->update([
                                'device_token' => $deviceToken,
                                'device_type' => $deviceType,
                                'version' =>"",
                                'device_name' => $deviceType,
                            ]);
                    }else{
                        DB::table('user_device_tokens')
                            ->insert([
                                'user_id' => $user->id,
                                'device_token' => $deviceToken,
                                'device_type' => $deviceType,
                                'version' => '',
                                'device_name' => $deviceType,
                            ]);
                    }
                }
                
                // Welcome message to patient
                if($user && $user->email){
                    $userData = [
                        'name' =>$user->name,
                        'body' =>'Welcome to register in arogyadham',
                        'thanks' =>'Thank you',
                        'websiteUrl'=> url('/'),
                        'email' =>$user->email,
                    ];
                    if(!empty($user->email)){
                        Notification::send($user, new WelcomeNotification($userData));
                    }
                }

                $users = User::with([
                    'userDetails.department',
                    'userDetails.language',
                    'userDetails.accommodation',
                    'sectionMaping.section',
                    'userDetails.country'
                    ])->find($user->id);
                return response()->json([
                    'status_code' => 200,
                    'message' => 'Your profile updated successfully',
                    'other_message' => 'Please wait for the confirmation',
                    'data' =>$users,
                    'token' =>$token,
                ],200);

            }

        } catch (JWTException $e) {

            return response()->json(['status_code' => 500,'message' => 'Could not updated user'], 500);
        }
    }

    // Profile details edit
    public function profileEdit(Request $request){
        
        $token = $request->bearerToken();
        $user = JWTAuth::authenticate($token);

        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string',
            'age' => 'required',
            'gender' => 'required',
            'address'=> 'required',
            'address2'=> 'required',
            'city'=> 'required',
            'state'=> 'required',
            'pincode'=> 'required',
            'country'=> 'required',
            //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'language_id'=> 'required',
            //'section_id'=> 'required',
            'accomudation_id'=> 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status_code' => 403,
                    'message' => $validator->messages()->first(),
                    'data' => []
            ],403);
        }


        try {

            $userDetail = PatientProfile::where('user_id', $user->id)->first();
            $userDetail->full_name = $request->input('full_name');
            $userDetail->age = $request->input('age');
            $userDetail->gender = $request->input('gender');
            //$userDetail->mobile = $fullPhoneNumber;
            //$userDetail->whats_no = $fullwhatNumber;
            //$userDetail->email = $request->input('email');
            $userDetail->address = $request->input('address');
            $userDetail->address2 = $request->input('address2');
            $userDetail->city = $request->input('city');
            $userDetail->state = $request->input('state');
            $userDetail->pincode = $request->input('pincode');
            $userDetail->country_id = $request->input('country');

            if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$request->image->extension(); 
            $path_img = "images/profile/".$imageName;
            Image::make($image)->resize('100','100')->save($path_img);
            $userDetail->profile_photo = $path_img;
            }

            $userDetail->language_id = $request->input('language_id');
            $userDetail->accomudation_id = $request->input('accomudation_id');
            $userDetail->save();

            //User update 
            $user = User::find($user->id);
            $user->name = ($user->name) ? $request->input('full_name') : $request->input('full_name');
            //$user->email = ($user->email) ? $user->email : $request->input('email');
            //$user->mobile_no = ($user->mobile_no) ? $user->mobile_no : $fullPhoneNumber;
            $user->save();

            $users = User::with(['userDetails.language','userDetails.accommodation','sectionMaping.section','userDetails.country'])->find($user->id);

            return response()->json([
                'status_code' => 200,
                'message' => 'Your profile updated successfully',
                'data' =>$users,
                'token' =>$token,
            ],200);

        } catch (JWTException $e) {

            return response()->json(['status_code' => 500,'message' => 'Could not updated user'], 500);
        }

    }


    public function departmentUpdate(Request $request){

        $token = $request->bearerToken();
        $user = JWTAuth::authenticate($token);
        $validator = Validator::make($request->all(), [
            'language_id'=> 'required',
            'department_id'=> 'required',
            'section_id'=> 'required',
            'accomudation_id'=> 'required',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status_code' => 403,
                    'message' => $validator->messages()->first(),
                    'data' => []
            ],403);
        }

        $userDetail = PatientProfile::where('user_id',$user->id)->get()->first();

        try {

            $deviceToken ="";
            $deviceType ="";
            if($request->has('device_token') || $request->has('device_type')){
                $deviceToken = $request->input('device_token');
                $deviceType = $request->input('device_type');
            }

            if(!empty($userDetail)){

                try {
                    $userDetail = PatientProfile::find($userDetail->id);

                    $userDetail->language_id = $request->input('language_id');
                    $userDetail->department_id = $request->input('department_id') ? $request->input('department_id'):1;
                    $userDetail->section_id = $request->input('section_id');
                    $userDetail->accomudation_id = $request->input('accomudation_id');
                    $userDetail->save();
                    //User update 
                    $user = User::find($user->id);
                    $user->is_active ='1';
                    $user->profile_complete ='1';
                    $user->save();

                    if($request->has('device_token') || $request->has('device_type')){
                        $deviceToken = $request->input('device_token');
                        $deviceType = $request->input('device_type');

                        $tokenCount = DB::table('user_device_tokens')->where('user_id', $user->id)->count();

                        if($tokenCount >0){
                            DB::table('user_device_tokens')->where('user_id', $user->id)
                                ->update([
                                    'device_token' => $deviceToken,
                                    'device_type' => $deviceType,
                                    'version' =>"",
                                    'device_name' => $deviceType,
                                ]);
                        }else{
                            DB::table('user_device_tokens')
                                ->insert([
                                    'user_id' => $user->id,
                                    'device_token' => $deviceToken,
                                    'device_type' => $deviceType,
                                    'version' => '',
                                    'device_name' => $deviceType,
                                ]);
                        }


                    }
                    
                    // Welcome message to patient
                    if($user && $user->email){
                        $userData = [
                            'name' =>$user->name,
                            'body' =>'Welcome to register in arogyadham',
                            'thanks' =>'Thank you',
                            'websiteUrl'=> url('/'),
                            'email' =>$user->email,
                        ];
                        if(!empty($user->email)){
                            Notification::send($user, new WelcomeNotification($userData));
                        }
                    }

                    $users = User::with([
                        'userDetails.department',
                        'userDetails.language',
                        'userDetails.accommodation',
                        'sectionMaping.section',
                        'userDetails.country',
                        ])->find($user->id);
                        
                    return response()->json([
                        'status_code' => 200,
                        'message' => 'Your profile updated successfully',
                        'other_message' => 'Please wait for the confirmation',
                        'data' =>$users,
                        'token' =>$token,
                    ],200);
            

                } catch (QueryException  $e) {

                    if ($e->errorInfo[1] == 1062) { // 1062 is the MySQL error code for duplicate entry
                        return response()->json([
                            'status_code' => 500,
                            'message' => 'error occurred duplicate saving the data',
                            'data' =>[],
                        ],500);
                    } else {
                        return response()->json([
                            'status_code' => 500,
                            'message' => 'An error occurred while saving the data',
                            'data' =>[],
                        ],500);
                    }
                }

            }else{

                $userDetail = new PatientProfile;
                $userDetail->user_id  = $user->id;
                $userDetail->language_id = $request->input('language_id');
                $userDetail->department_id = $request->input('department_id') ? $request->input('department_id'):1;
                $userDetail->section_id = $request->input('section_id');
                $userDetail->accomudation_id = $request->input('accomudation_id');
                $userDetail->save();
                // User update 
                $user = User::find($user->id);
                $user->is_active ='0';
                $user->profile_complete ='1';
                $user->save();
                if($request->has('device_token') || $request->has('device_type')){
                    $deviceToken = $request->input('device_token');
                    $deviceType = $request->input('device_type');

                    $tokenCount = DB::table('user_device_tokens')->where('user_id', $user->id)->count();

                    if($tokenCount >0){
                        DB::table('user_device_tokens')->where('user_id', $user->id)
                            ->update([
                                'device_token' => $deviceToken,
                                'device_type' => $deviceType,
                                'version' =>"",
                                'device_name' => $deviceType,
                            ]);
                    }else{
                        DB::table('user_device_tokens')
                            ->insert([
                                'user_id' => $user->id,
                                'device_token' => $deviceToken,
                                'device_type' => $deviceType,
                                'version' => '',
                                'device_name' => $deviceType,
                            ]);
                    }
                }
                
                // Welcome message to patient
                if($user && $user->email){
                    $userData = [
                        'name' =>$user->name,
                        'body' =>'Welcome to register in arogyadham',
                        'thanks' =>'Thank you',
                        'websiteUrl'=> url('/'),
                        'email' =>$user->email,
                    ];
                    if(!empty($user->email)){
                        Notification::send($user, new WelcomeNotification($userData));
                    }
                }

                $users = User::with(['userDetails.department','userDetails.state','userDetails.language','userDetails.accommodation','sectionMaping.section','userDetails.country'])->find($user->id);
                return response()->json([
                    'status_code' => 200,
                    'message' => 'Your profile updated successfully',
                    'other_message' => 'Please wait for the confirmation',
                    'data' =>$users,
                    'token' =>$token,
                ],200);

            }

        } catch (JWTException $e) {

            return response()->json(['status_code' => 500,'message' => 'Could not updated user'], 500);
        }

       
    }


    public function getDepartment(Request $request){
        
        try {
        $department = Department::select('id','name','description','icon','status')->get();
        return response()->json([
            'status_code' => 200,
            'message' => 'found department',
            'data' =>$department
        ], 200);

        } catch (\Throwable $th) {
            return response()->json(['status_code' => 500,'message' => 'Department not found'], 500);
        }
    }

    public function getStates(Request $request){

        try {
            $states = State::select('id','state_name','status')->get();
            return response()->json([
                'status_code' => 200,
                'message' => 'found states',
                'data' =>$states
            ], 200);
    
        } catch (\Throwable $th) {

            return response()->json(['status_code' => 500,'message' => 'Some things went to wrong'], 500);
        }

    }


    public function getLanguage(Request $request){
        try {
            $languages = Language::select('id','name', 'shortname', 'language_flag','status')->get();
            return response()->json([
                'status_code' => 200,
                'message' => 'found languages',
                'data' =>$languages
            ], 200);
    
        } catch (\Throwable $th) {
            return response()->json(['status_code' => 500,'message' => 'Some things went to wrong'], 500);
        }
    }


    public function getAccommodation(Request $request){
        try {
            $accommodations = Accommodation::select('id','accommodation_name','accommodation_detail','status')->get();
            return response()->json([
                'status_code' => 200,
                'message' => 'found languages',
                'data' =>$accommodations
            ], 200);
        } catch (\Throwable $th) {
            return response()->json(['status_code' => 500,'message' => 'Some things went to wrong'], 500);
        }
    }


    public function getCountry(Request $request){
        try {
            
            $country = Country::select('id','name', 'phone_code', 'status')->where('status','1')->get();
            return response()->json([
                'status_code' => 200,
                'message' => 'found country',
                'data' =>$country
            ], 200);
        } catch (\Throwable $th) {
            return response()->json(['status_code' => 500,'message' => 'Some things went to wrong'], 500);
        }
    }


    public function getAllProfileUdateData(Request $request){

        try {
            $department = Department::select('id','name','status')->where('status','1')->get();
            $states = State::select('id','state_name','status')->where('status', 1)->get();
            $languages = Language::select('id','name','shortname', 'language_flag','status')->where('status', '1')->get();
            $accommodations = Accommodation::select('id','name','description','status')->where('status', '1')->get();
            $section = Section::select('id','name','status')->where('status','1')->get();
            $country = Country::select('id','name', 'phone_code', 'status')->where('status','1')->get();

            return response()->json([
                'status_code' => 200,
                'message' => 'found profile data',
                'data' =>[
                    'states'=>$states,
                    'languages'=>$languages,
                    'department'=>$department,
                    'accommodations'=>$accommodations,
                    'sections'=>$section,
                    'country'=>$country
                    ]
            ], 200);
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return response()->json(['status_code' => 500,'message' => 'Some things went to wrong'], 500);
        }

    }

    public function userDetail(Request $request){
        $token = $request->bearerToken();

        try {
            $user = JWTAuth::authenticate($token);
           //return $users = User::with('userDetails')->find($user['id']);
           return $users = User::with(['userDetails.department','userDetails.state','userDetails.language','userDetails.accommodation'])->find($user['id']);
            return response()->json([
                'status_code' => 200,
                'message' => 'found profile details',
                'data' => $users
            ],200);

        } catch (\Throwable $th) {
            return response()->json(['status_code' => 500,'message' => 'Some things went to wrong'], 500);
        }

    }

    public function devicetokenUpdate(Request $request){
        $token = $request->bearerToken();

        try {
            $user = JWTAuth::authenticate($token);
            $id = $user->id;
            $user = User::find($id);
            if (!$user) {
                return response()->json([
                    'status_code' => 404,
                    'message' => 'User not found',
                    'data' => []
                ],404);
            }
            // Update the user attributes
            DB::table('user_device_tokens')->where('user_id', $user->id)
            ->update([
                'device_token' => $request->input('device_token'),
                'device_type' => $request->input('device_type'),
                'version' =>"",
                'device_name' => $request->input('device_token'),
            ]);
            return response()->json([
                'status_code' => 200,
                'message' => 'User device token updated successfully',
                'data' => $user
            ],200);
        } catch (\Throwable $th) {
            return response()->json(['status_code' => 500,'message' => 'Some things went to wrong'], 500);
        }
    }


    public function usersLog(Request $request){
        $token = $request->bearerToken();
        try {

            $user = JWTAuth::authenticate($token);
            //return $ipAddress = $request->ip();
            //$ipAddress = "122.173.31.242";

            $validator = Validator::make($request->all(), [
                'ip'=> 'required',
            ]);
    
            if($validator->fails()) {
                return response()->json([
                    'status_code' => 403,
                        'message' => $validator->messages()->first(),
                        'data' => []
                ],403);
            }

            $ipAddress = $request->input('ip');
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

            //If automatically logout 
            $autologout = UserLog::where([
                'user_id' => $user->id,
                'platform' => $request->header('User-Agent'),
                'ip' => $ipAddress,
            ])->whereNull('logout_date')->get()->first();

            if($autologout) {
                $login_time = $autologout->login_date;
                $duration = Carbon::now()->diffInSeconds($login_time, true);
                $autologout->update(['logout_date' =>  NOW(), 'duration' => $duration]);
            }

            UserLog::create([
                'user_id' => $user->id,
                'platform' => $request->header('User-Agent')?? 'Browser',
                'ip' => $ipAddress,
                'location' => $location,
                'login_date' => NOW(),
            ]);

            return response()->json([
                'status_code' => 200,
                'message' => 'User log added successfully',
                'data' => $user
            ],200);


        } catch (\Throwable $th) {
            echo $th->getMessage();
            return response()->json(['status_code' => 500,'message' => 'Some things went to wrong'], 500);
        }

    }


}
