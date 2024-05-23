<?php

namespace App\Helpers;

use App\Models\User;
use App\Models\Language as NewLanguage;
use App\Models\Venue;
use App\Models\Section;
use App\Models\UserDeviceToken;
use App\Models\AppNotification;
use Illuminate\Http\UploadedFile;
use Carbon\Carbon;
use DB;
use JWTAuth;
use Auth;


use Illuminate\Support\Facades\Http;

class UserHelper
{
    public static function getTotalUsers($section_id)
    {

            $sectionId = $section_id;
            $roleId = 4;

           /*return $userCount = User::whereHas('sections', function ($query) use ($sectionId) {
                $query->where('sections.id', $sectionId);
            })
            ->where('role', $roleId)
            ->count();*/

        return User::where('role',4)->count();
    }

    public static function dischargePatient(){
        return User::where(['role'=>4, 'is_active'=>'0'])->count();
    }

    public static function newPatient(){

        return User::where(['role'=>4, 'is_active'=>'1'])->count();
    }

    public static function getTotalDoctor()
    {
        return User::where('role',2)->count();
    }

    public static function getTotalIntern()
    {
        return User::where('role',3)->count();
    }


    public static function isLanguage($langId){
        return NewLanguage::where('id',$langId)->select('id','name','shortname','language_flag','status')->first();
    }

    public static function isvenueLanguage($langId){
        return Venue::where('language_id',$langId)->select('id','name','department_id','language_id','therapy_id','status')->first();
    }

    public static function isSection($sectionId){
        return Section::where('id',$sectionId)->select('id','name','status')->first();
    }

    public static function isvenueSection($sectionId){
        return Venue::where('section_id',$sectionId)->select('id','name','department_id','language_id','therapy_id','status')->first();
    }

    public static function defaultVenu($venueId){
        return Venue::where('id',$venueId)->select('id','name','status')->first();
    }

    public static function userdeviceToken($userId){
        return UserDeviceToken::where('user_id',$userId)->where('notification_ison', '1')->select('device_token','device_type')->first();
    }


    public static function userTherapyLanguageVenue($departmentId =null, $userLangId){

       // return Venue::where('department_id',$departmentId)->('language_id', $userLangId)->select('id','name')->get();
        
       return Venue::orWhere(function($query) use ($departmentId, $userLangId) {
        $query->where('department_id', $departmentId);
        $query->where('language_id', 1);
        })
         ->orWhere(function($query) use ($departmentId, $userLangId) {
        $query->where('department_id', $departmentId);
        $query->where('language_id', 0);
        })->select('id', 'name')->get();
    }



    public static function sendNotificationTouser($userId, $msg=null, $departmentStatus=null){

        $devicetoken = DB::table('user_device_tokens')->select('device_token')->where('user_id', $userId)->where('notification_ison', '1')->first();

        $token = $devicetoken->device_token ? $devicetoken->device_token:'';
        if($token){

            $notification = [
                'title' =>'Profile status',
                'body' => $msg,
                //'sound' => 'default',
                'sound' =>'https://arogyadhamaapp.sdnaprod.com/tone/notification.wav',
            ];

            // Prepare the data payload

            $data = [
                'title' =>'Profile status',
                'description' => $msg,
            ];

            $message = [
                'to' => $token,
                'notification' => $notification,
                'data' => $data,
            ];


            $instance = new self();
            $accessToken = $instance->getAccessToken();
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '. $accessToken,
                'Content-Type' => 'application/json',
            ])->post('https://fcm.googleapis.com/fcm/send', $message);

             if ($response->ok()) {

                $senderId = Auth::user()->id;
                $currentDateTime = Carbon::now();
                $formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');
                $appNotification = new AppNotification;
                $appNotification->sender_id = $senderId;
                $appNotification->receiver_id = $userId;
                $appNotification->notification_type = $departmentStatus;
                $appNotification->notification_title = "Profile status";
                $appNotification->notification_message = $msg;
                $appNotification->notification_icon = "";
                $appNotification->creation_datetime = $formattedDateTime;
                $appNotification->save();
                return response()->json(['message' => 'Notification sent'], 200);
             }
         }

    }



    public static function sendNotification($userId, $msg=null, $titlenotification=null){

        $devicetoken = DB::table('user_device_tokens')->select('device_token')->where('user_id', $userId)->where('notification_ison', '1')->first();

        $senderId = Auth::user()->id;
        if(!empty($devicetoken)){
            $token = $devicetoken->device_token;

            $notificationType = (!empty($titlenotification) && $titlenotification == "Therapy") ? 6 : 7;

            $notification = [
                'title' =>$titlenotification,
                'body' =>$msg,
                //'sound' =>'default',
                'sound' =>'https://arogyadhamaapp.sdnaprod.com/tone/notification.wav',
            ];

            // Prepare the data payload
            $data = [
                'title' =>$titlenotification,
                'description' =>$msg,
            ];

            $message = [
                'to' =>$token,
                'notification' =>$notification,
                'data' =>$data,
            ];

            $instance = new self();
            $accessToken = $instance->getAccessToken();

            $response = Http::withHeaders([
                'Authorization' => 'Bearer '. $accessToken,
                'Content-Type' => 'application/json',
            ])->post('https://fcm.googleapis.com/fcm/send', $message);

            if ($response->ok()){

                $currentDateTime = Carbon::now();
                $formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');
                $appNotification = new AppNotification;
                $appNotification->sender_id = $senderId;
                $appNotification->receiver_id = $userId;
                $appNotification->notification_type = $notificationType;
                $appNotification->notification_title = $titlenotification;
                $appNotification->notification_message = $msg;
                $appNotification->notification_icon = "";
                $appNotification->creation_datetime = $formattedDateTime;
                $appNotification->save();

                return response()->json(['message' => 'Added therapy'], 200);
            }

        }else{

            return response()->json(['message' => 'User token not found'], 200);
        }
    }



    private static function getAccessToken()
    {
        return config('app.fcm_server_key');
    }

    // Check user is active or not



    public static function  uploadImage(UploadedFile $file, $destinationPath){
    
    $fileName = time() . '_' . $file->getClientOriginalName();

    $file->move(public_path($destinationPath), $fileName);

    // Return the path to the uploaded image
    return $destinationPath . '/' . $fileName;
}


    public static function checkUserActive($token)
    {

        $user = JWTAuth::authenticate($token);
        if ($user && $user->status =='1') {
            return true;
        }
        
        return false;
    }


    public static function getTherapySectionwise($sectionId, $usersectionId){

        if($sectionId >0){
            
            return $venues = Venue::where('section_id', $usersectionId)
                ->select('id', 'name', 'longitude', 'latitude')
                ->get()->toArray();
        }
    }

    public static function getTherapyLanguagewise($languageId){
        if($languageId >0){
            $languageIds = [1, 2, 3];
            return $venues = Venue::whereIn('id', $languageIds)
                ->with('language:id,name')
                ->select('id', 'name', 'longitude', 'latitude','language_id')
                ->get()->toArray();
        }
    }

    public static function getTherapyDefaultVenu($defaultvenuId){
        if($defaultvenuId >0){
            return $venues = Venue::where('id', $defaultvenuId)
                ->select('id', 'name', 'longitude','latitude')
                ->get()->toArray();
        }
    }


    public static function languageSwitch(){
        return  NewLanguage::where('status','1')->select('id','name','shortname')->orderBy('id', 'desc')->get();

    }


}
