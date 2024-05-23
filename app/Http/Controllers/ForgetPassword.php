<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\PasswordResetNotification;
use Notification;
use Illuminate\Support\Str;

class ForgetPassword extends Controller
{
    public function index(Request $request){


        if ($request->isMethod('post')) {

            $validatedData = $request->validate([
                'email' => 'required|email',
            ],[
                'email.required' => 'The email field is required.',
                'email.email' => 'Please enter a valid email address.',
            ]);

            $email = $request->input('email');
            $user = User::where('email', $email)->get()->first();

           $ranPwd = Str::random(6);

            //Password forget notification
            if($user && $user->email){
                $user->update(['password'=>bcrypt($ranPwd)]);
                $userData = [
                    'name' =>$user->name,
                    'password'=>$ranPwd,
                    'body' =>'Forget your password',
                    'thanks' =>'Thank you',
                    'websiteUrl'=> url('/'),
                    'email' =>$user->email,
                ];
                if(!empty($user->email)){
                    Notification::send($user, new PasswordResetNotification($userData));
                }
            }

            return back()->with(['message'=>'Your password changed, please check your email!']);

        }

        return view('forget-password');

    }
}
