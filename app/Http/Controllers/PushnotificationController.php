<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Department;
use App\Models\Section;
use App\Models\Role;
use App\Models\AppNotification;
use App\Models\AppNotificationTitle;
use Carbon\Carbon;
use Auth;
use App\Helpers\UserHelper;

class PushnotificationController extends Controller
{
    
    public function notification(Request $request){

        $department = Department::take('5')->get();

        $section = Section::all();
        $notificationTitle = AppNotificationTitle::all();
        $users = User::Where('role',4)->get();

        return view('admin.notification')->with(['departments'=>$department, 'sections'=>$section, 'controller'=>'HomeController','page_type'=>'admin','notificationTitle'=>$notificationTitle,'users'=>$users, 'route_type'=>'selectpicker']);
    }

    public function sendnotification(Request $request){
        

        if($request->isMethod('post')){

            $request->validate([
                'notification_description' => 'required|string|between:5,300'
            ]);

            $data  = $request->all();

            $senderId = Auth::user()->id;

            //$departments = DB::table('departments')->pluck('id')->toArray();
            $sections = DB::table('sections')->pluck('id')->toArray();
            $roles = DB::table('roles')->pluck('id')->toArray();

            $notificationType = $data['notification_type'];

            $notificationTitle = DB::table('app_notification_titles')->select('notification_title','notification_type')->where('notification_type', $notificationType)->first();

            $notificationTitle = $notificationTitle->notification_title;
            $notificationDescription = $data['notification_description'];
            $notificationSection = $data['notification_section'];



            $notificationicone = "";
            if($request->hasFile('image')) {
                $file = $request->file('image');
                $destinationPath = "/images/icone";
                $imagePath = UserHelper::uploadImage($file, $destinationPath);
                $notificationicone = config('app.app_url').$imagePath;
            }


            $sectionId  = array_filter($data['notification_section']);
            $notificationAssigned = array_filter($data['notification_assigned']);

            $patients="";
            if(isset($data['users'])){
                $patients = array_filter($data['users']);
            }
            

            $users = User::where(function ($query) use ($sectionId, $notificationAssigned, $patients) {

                    if (!empty($sectionId)) {
                        $query->whereHas('sections', function ($query) use ($sectionId) {
                            $query->whereIn('section_id', $sectionId);
                        });
                    }

                    if (!empty($notificationAssigned)) {
                        $query->whereIn('role', $notificationAssigned);
                    }

                    if (!empty($patients)) {
                        $query->whereIn('id', $patients);
                    }
                })
                ->with('sectionMaping.section')
                ->get();

            if($users->isEmpty()) {
                return redirect()->back()->with('fail', 'Your filter users not found');
            }

                /*$notification = [
                    'title' => $notificationTitle,
                    'body' => $notificationDescription,
                    'sound' => 'default',
                ];*/

            //Prepare the data payload

                $data = [
                    'title' => $notificationTitle,
                    'description' => $notificationDescription,
                    'body' => $notificationDescription,
                    'sound' => 'default',
                    'image' => $notificationicone,
                ];

                foreach ($users as $user) {

                    $userDevice = UserHelper::UserDeviceToken($user->id);

                    if(empty($userDevice)){
                         continue;
                    }

                    $deviceToken = $userDevice->device_token;
                    $deviceType  = $userDevice->device_type;

                    if($deviceType =="Android"){

                        $message = [
                            'to' => $deviceToken,
                            'notification' => $data, // here was notification variable
                            //'data' => $data,
                        ];

                        $response = Http::withHeaders([
                            'Authorization' => 'Bearer ' . $this->getAccessToken(),
                            'Content-Type' => 'application/json',
                        ])->post('https://fcm.googleapis.com/fcm/send', $message);

                        // Handle the response
                        if ($response->ok()) {
                            $currentDateTime = Carbon::now();
                            $formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');
                            $appNotification = new AppNotification;
                            $appNotification->sender_id = $senderId;
                            $appNotification->receiver_id = $user->id;
                            $appNotification->notification_type = $notificationType;
                            $appNotification->notification_title = $notificationTitle;
                            $appNotification->notification_message = $notificationDescription;
                            $appNotification->notification_icon = $notificationicone;
                            $appNotification->creation_datetime = $formattedDateTime;
                            $appNotification->save();

                            //return response()->json(['message' => 'Push notification sent'], 200);
                        } 


                    }else{

                        // send notification iso devices
                    }

                }

            return redirect()->back()->with('success', 'Push notification sent');
        }

    }


    private function getAccessToken()
    {
        // Retrieve the FCM server key from your .env or configuration
        return config('app.fcm_server_key');

    }



}
