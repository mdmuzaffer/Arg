<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use JWTAuth;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function register(Request $request)
    {
    	//Validate data
        //$data = $request->only('name', 'email', 'password');

        $loginField = $request->input('username');
        $loginType = filter_var($loginField, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
        $valid  = ($loginType == 'email') ? 'required|email|unique:users' : 'required|digits_between:10,12|numeric|unique:users';

        $data = ['name'=>$request->input('name'), $loginType => $loginField, 'password' => $request->input('password')];
        $userData = ['name'=>$request->input('name'), $loginType => $loginField, 'password' => bcrypt($request->input('password'))];

        $validator = Validator::make($data, [
            'name' => 'required|string',
            $loginType => $valid,
            'password' => 'required|string|min:6|max:50'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        // echo "<pre>";
        // print_r($userData);
        // die;

        //Request is valid, create new user
        $user = User::create($userData);


        //User created, return success response
        return response()->json([
            'success' => true,
            'message' => 'User created successfully',
            'data' => $user
        ], Response::HTTP_OK);
    }
 
    public function authenticate(Request $request)
    {
        //$credentials = $request->only('email', 'password');

        $loginField = $request->input('username');
        $loginType = filter_var($loginField, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
        $credentials = [$loginType => $loginField, 'password' => $request->input('password')];
        
        $valid  = ($loginType == 'email') ? 'required|email' : 'required|digits_between:10,12|numeric';

        //valid credential
        $validator = Validator::make($credentials, [
            $loginType => $valid,
            'password' => 'required'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is validated
        //Crean token
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json([
                	'success' => false,
                	'message' => 'Login credentials are invalid.',
                ], 400);
            }
        } catch (JWTException $e) {
    	return $credentials;
            return response()->json([
                	'success' => false,
                	'message' => 'Could not create token.',
                ], 500);
        }
 	
 		//Token created, return with success response and jwt token
        return response()->json([
            'success' => true,
            'token' => $token,
        ]);
    }
 
    public function logout(Request $request)
    {
		//Request is validated, do logout        
        try {

            $token = $request->bearerToken();
            JWTAuth::invalidate($token);
 
            return response()->json([
                'success' => true,
                'message' => 'User has been logged out'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, user cannot be logged out'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
 
    public function get_user(Request $request)
    {
        $token = $request->bearerToken();
        $user = JWTAuth::authenticate($token);
 
        return response()->json(['user' => $user]);
    }

    public function mobileAuthenticate(Request $request){

        $credentials = $request->only('mobile');
        $validator = Validator::make($credentials, [
            'mobile' => 'required|digits_between:10,12|numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        try {

            $user = User::where('mobile', $request->mobile)->get()->first();
            $token = JWTAuth::fromUser($user);

            if (!$user) {
                return response()->json(['status' => 'error','message' => 'Unauthorized'], 401);
            }

            return response()->json(['status' => 'success','user' => $user,'token' => $token,]);

        } catch (JWTException $e) {
    	return $credentials;
            return response()->json(['success' => false,'message' => 'Could not create token.'], 500);
        }
 	
 		//Token created, return with success response and jwt token
        return response()->json(['success' => true,'token' => $token,]);

        

    }


}
