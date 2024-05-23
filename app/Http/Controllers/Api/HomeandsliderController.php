<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Department;
use App\Models\Slider;
use App\Models\AppIcone;
use App\Models\UserDailychart;
use App\Models\Language;
use App\Models\PatientProfile;
use App\Models\Venue;
use JWTAuth;
use App\Models\User;
use App\Helpers\UserHelper;
use Illuminate\Support\Collection;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\PatientDefaultDailyChart;
use App\Models\WeeklySchedule;
use App\Models\WeekDay;

class HomeandsliderController extends Controller
{
    public function getallSliderdata($userlang){

        try {
             $slider = Slider::select('id','title','description','images','language_code','status','slider_type')->where(['status'=>1, 'language_code'=>$userlang])->orderBy('slider_type', 'asc')->get();
             if(count($slider)>0){
                return $slider;
             }
             return response()->json(['status_code' => 404,'message' => 'Slider data not found'], 404);
        } catch (\Throwable $th) {
            return response()->json(['status_code' => 500,'message' => 'something went to wrong'], 500);
        }
       
    }

    public function getalldepartmentdata($token=null){
        try {
            $user = JWTAuth::authenticate($token);
           // $department = Department::get();
            $department = $user->userDetails->department;
            if(!empty($department)){
               return $department;
            }
            return response()->json(['status_code' => 404,'message' => 'Department data not found'], 404);
       } catch (\Throwable $th) {
           return response()->json(['status_code' => 500,'message' => 'something went to wrong'], 500);
       }
    }


public function userPayment($token =null){
   
    try {
        $user = JWTAuth::authenticate($token);
        $payment = $user->payment;
        if(!empty($payment)){
           return $payment;
        }
        return response()->json(['status_code' => 404,'message' => 'Payment data not found'], 404);
    } catch (\Throwable $th) {
       return response()->json(['status_code' => 500,'message' => 'Something went to wrong'], 500);
   }
}


public function dailySchedule(Request $request){

    try {

       $date = $request->input('date');
       $chartType = $request->input('chart_type');
       
       $token = $request->bearerToken();
       $user = JWTAuth::authenticate($token);
       $sectionId = $user->sectionMaping->section_id;

       if(!UserHelper::checkUserActive($token)){
            return response()->json([
                'status_code' => 200,
                'message'=>'You are inactive',
                'data'=>[]
            ],200);
        }

        // for default therapy for chart_type =1
        if($chartType ==1){
            return $this->defaultdailygeneralchart($sectionId);
        }

        //start according new database
        //$sectionId = $user->userDetails->section_id;
        $sectionId = $user->sectionMaping->section_id;
        $languageId = $user->userDetails->language_id;

        $datename = Carbon::createFromFormat('Y-m-d', $date);
        $dayName = $datename->format('l');
        $weekDay = WeekDay::where('day', $dayName)->first();
        $weeklyTherapy = $weekDay->weeklySchedules->toArray();
        $therapyIds = array_column($weeklyTherapy, 'therapy_id');


        $defaultdata = [];

        // if tuesday then new chart otherwise other chart for 6 days
        if( $dayName =="Tuesday"){
            $defaultdata = DB::table('therapies')
            ->select('id', 'therapy_name', 'department_id', 'group_id', 'start_time', 'end_time', 'therapist_id', 'section_id', 'is_default', 'is_language', 'is_day', 'default_venue', 'status', 'description', 'order', 'app_type')
            ->orWhereIn('id', $therapyIds)
            ->get()
            ->toArray();
        }else{
            $defaultdata = DB::table('therapies')
            ->select('id', 'therapy_name', 'department_id', 'group_id', 'start_time', 'end_time', 'therapist_id', 'section_id', 'is_default', 'is_language', 'is_day', 'default_venue', 'status', 'description', 'order', 'app_type')
            ->where(function ($query) use ($sectionId, $therapyIds) {
                $query->where('section_id', $sectionId)
                    ->orWhereIn('id', $therapyIds);
            })
            ->get()
            ->toArray();
        }


        $unsetSpecialTechnique = array_filter($defaultdata, function($value) {
            return $value->therapy_name !== "Special Technique";
        });
       $defaultdatadaywise = array_values($unsetSpecialTechnique);

        $defData =[];
        foreach ($defaultdatadaywise as $key => $value) {
            if ($value->is_language >0) {
                $value->language = UserHelper::isLanguage($languageId);
                $value->venue = UserHelper::isvenueLanguage($languageId);
            }
            if($value->section_id >0){
                $value->section = UserHelper::isSection($sectionId);
                $value->venue = UserHelper::isvenueSection($sectionId);
            }
            if($value->default_venue >0){
                $value->venue = UserHelper::defaultVenu($value->default_venue);
            }

            $defData[] = $value;
        }
        
       //return $defData;

         $userVisite = DB::table('user_visits')->where(['patient_id'=>$user->id, 'status'=>'1'])
            ->select('id','patient_id','doctor_id','date','notes','status')->first();

        if (!empty($userVisite->id)) {

            $visitId = $userVisite->id;
            $visitDate = $userVisite->date;
            $addvisitDate = Carbon::createFromFormat('Y-m-d', $visitDate);

            $userTherapydefaulCount = UserDailychart::with('department','patient','therapy.group','doctor','intern','venue')
            ->where(['user_visit_id'=>$visitId, 'date'=>$visitDate, 'is_default'=>1])->count();


            // check if not any therapy then insert
            if($userTherapydefaulCount <1){

                $weekDay = WeekDay::where('id', 1)->first();
               // $therapyIds= "";
                if($weekDay->day =="Tuesday"){
                    $weeklyTherapy = $weekDay->weeklySchedules->toArray();
                    $therapyIds = array_column($weeklyTherapy, 'therapy_id');
                }

                // Fore tuesday therapy
                $defaultdata = DB::table('therapies')
                     ->select('id', 'therapy_name', 'department_id', 'group_id', 'start_time', 'end_time', 'therapist_id', 'section_id', 'is_default', 'is_language', 'is_day', 'default_venue', 'status', 'description', 'order', 'app_type')
                     ->orWhereIn('id', $therapyIds)
                    ->get()
                    ->toArray();


                $defData =[];
                foreach ($defaultdata as $key => $value) {
                    if ($value->is_language == 1) {
                        $value->language = UserHelper::isLanguage($languageId);
                        $value->venue = UserHelper::isvenueLanguage($languageId);
                    }
                    if($value->section_id >0){
                        $value->section = UserHelper::isSection($sectionId);
                        $value->venue = UserHelper::isvenueSection($sectionId);
                    }
                    if($value->default_venue >0){
                        $value->venue = UserHelper::defaultVenu($value->default_venue);
                    }

                    $defData[] = $value;
                }

                $addvisitDate->format('Y-m-d');
                foreach ($defData as $key => $defaultTherapy) {
                    $defaultdata = [
                        'patient_id' =>$userVisite->patient_id,
                        'user_visit_id' =>$userVisite->id,
                        'department_id' =>$defaultTherapy->department_id,
                        'date' =>$addvisitDate,
                        'start_time' =>$defaultTherapy->start_time,
                        'end_time' =>$defaultTherapy->end_time,
                        'therapy_id' =>$defaultTherapy->id,
                        'doctor_id' =>$userVisite->doctor_id,
                        'daily_notes' =>"Use daily therapy",
                        'precaution_medicine' =>"Need this therapy",
                        'venue_id' =>$defaultTherapy->venue->id,
                        'is_default' =>1,
                        'is_day'=>1,
                        'created_at' =>Carbon::now(),
                        'updated_at' =>Carbon::now()
                    ];
                DB::table('user_dailycharts')->insert($defaultdata);
                }
                $addvisitDate->addDay();

                for($i=2; $i<=7; $i++){

                    $weekDay = WeekDay::where('id', $i)->first();
                    $weeklyTherapy = $weekDay->weeklySchedules->toArray();
                    $therapyIds = array_column($weeklyTherapy, 'therapy_id');

                   $defaultdata = DB::table('therapies')
                        ->select('id', 'therapy_name', 'department_id', 'group_id', 'start_time', 'end_time', 'therapist_id', 'section_id', 'is_default', 'is_language', 'is_day', 'default_venue', 'status', 'description', 'order', 'app_type')
                        ->where(function ($query) use ($sectionId, $therapyIds) {
                            $query->where('section_id', $sectionId)
                                ->orWhereIn('id', $therapyIds);
                        })
                        ->get()
                        ->toArray();

                    $defData =[];
                    foreach ($defaultdata as $key => $value) {
                        if ($value->is_language == 1) {
                            $value->language = UserHelper::isLanguage($languageId);
                            $value->venue = UserHelper::isvenueLanguage($languageId);
                        }
                        if($value->section_id >0){
                            $value->section = UserHelper::isSection($sectionId);
                            $value->venue = UserHelper::isvenueSection($sectionId);
                        }
                        if($value->default_venue >0){
                            $value->venue = UserHelper::defaultVenu($value->default_venue);
                        }

                        $defData[] = $value;
                    }

                   $userVisite = DB::table('user_visits')->where(['patient_id'=>$user->id, 'status'=>'1'])
                    ->select('id','patient_id','doctor_id','date','notes','status')->first();

                    if(!empty($userVisite->id)){

                        $visitId = $userVisite->id;
                        $visitDate = $userVisite->date;

                        $addvisitDate = Carbon::createFromFormat('Y-m-d', $visitDate);

                            $addvisitDate->format('Y-m-d');
                            foreach ($defData as $key => $defaultTherapy) {
                                $defaultdata = [
                                    'patient_id' =>$userVisite->patient_id,
                                    'user_visit_id' =>$userVisite->id,
                                    'department_id' =>$defaultTherapy->department_id,
                                    'date' =>$addvisitDate,
                                    'start_time' =>$defaultTherapy->start_time,
                                    'end_time' =>$defaultTherapy->end_time,
                                    'therapy_id' =>$defaultTherapy->id,
                                    'doctor_id' =>$userVisite->doctor_id,
                                    'daily_notes' =>"Use daily therapy",
                                    'precaution_medicine' =>"Need this therapy",
                                    'venue_id' =>$defaultTherapy->venue->id,
                                    'is_default' =>1,
                                    'is_day'=>$i,
                                    'created_at' =>Carbon::now(),
                                    'updated_at' =>Carbon::now()
                                ];
                            DB::table('user_dailycharts')->insert($defaultdata);
                                
                            }

                            $addvisitDate->addDay();
                    }

                }

            }

            // Insert therapy 


           $userTherapy = UserDailychart::with('department','patient','therapy.group','doctor','intern','venue')
            ->where(['user_visit_id'=>$visitId, 'is_day'=>$weekDay->id])->get()->toArray();



            // foreach ($userTherapy as $key =>$diets){
            //     $breakfast = $diets['therapy']['group_id'];
            //     // remove default breakfast if added
            //     if($breakfast ==1){
            //         foreach ($defData as $key => $value) {
            //             if ($value->therapy_name =="Normal Breakfast"){
            //                 unset($defData[$key]);
            //             }
            //         }
            //     }
            //     // remove default lunch if added
            //     if($breakfast ==3){
            //         foreach ($defData as $key => $value) {
            //             if($value->therapy_name == "Normal Lunch") {
            //                 unset($defData[$key]);
            //             }
            //         }
            //     }
            //     // remove default dinner if added
            //     if($breakfast ==5){
            //         foreach ($defData as $key => $value) {
            //             if ($value->therapy_name == "Normal Dinner") {
            //                 unset($defData[$key]);
            //             }
            //         }
            //     }
            // }


            $userTherapies =[];
            foreach ($userTherapy as $key =>$value) {
                $userTherapies[$key] = $value['therapy'];
                unset($userTherapies[$key]['start_time']);
                unset($userTherapies[$key]['end_time']);

                //Set time for therapy
                $userTherapies[$key]['start_time'] = $value['start_time'];
                $userTherapies[$key]['end_time'] = $value['end_time'];

                $userTherapies[$key]['department'] = $value['department'];
                $userTherapies[$key]['patient'] = $value['patient'];
                $userTherapies[$key]['doctor'] = $value['doctor'];
                $userTherapies[$key]['intern'] = $value['intern'];
                $userTherapies[$key]['venue'] = $value['venue'];
                $userTherapies[$key]['daily_notes'] = $value['daily_notes'];
                $userTherapies[$key]['precaution_medicine'] = $value['precaution_medicine'];

                //set language if exist
                if (isset($value['therapy']['is_language'])) {
                    //return UserHelper::isLanguage(1);
                    $userTherapies[$key]['language'] = ($value['therapy']['is_language'] > 0 ) ? UserHelper::isLanguage($languageId) : NULL;
                    } else {
                        $userTherapies[$key]['language'] = NULL;
                }
            }


            $therapyGroup = [];
            foreach ($userTherapies as $key => $value) {
                if($value['group']!== null){

                    $therapyGroup[$key] = $value;
                    unset($therapyGroup[$key]['therapy_name']);
                    $therapyGroup[$key]['therapy_name'] = $value['group']['name'];
                    $therapyGroup[$key]['items'][] = $value['therapy_name'];
                }else{
                    $therapyGroup[$key] = $value;
                }
            }


            // Step 1: Sort the therapy data by start time
            usort($therapyGroup, function($a, $b) {
                // Check if 'start_time' index exists and is not null
                if(isset($a['start_time']) && isset($b['start_time'])) {
                    return strcmp($a['start_time'], $b['start_time']);
                }
                return 0; // Return 0 if 'start_time' index is missing or null
            });


            // Step 2: Group therapies by start time
            $groupedTherapies = [];
            foreach ($therapyGroup as $therapy) {
                // Check if 'start_time' index exists and is not null
                if(isset($therapy['start_time'])) {
                    $groupedTherapies[$therapy['start_time']][] = $therapy;
                }
            }

            // Step 3: Sort therapies within each group by group name
            foreach ($groupedTherapies as &$therapies) {
                usort($therapies, function($a, $b) {
                    // Check if 'group' index exists and is not null
                    if(isset($a['group']['name']) && isset($b['group']['name'])) {
                        return strcmp($a['group']['name'], $b['group']['name']);
                    }
                    return 0; // Return 0 if 'group' index is missing or null
                });
            }


            $userassignTherapies = array_map(function ($items) {
                $mergedItems = collect($items)->pluck('items')->flatten()->reject(function ($item) {
                    return $item === null;
                })->unique()->values();
            
                $firstItem = reset($items);
                $groupedArray = $firstItem;
                $groupedArray['items'] = $mergedItems->isEmpty() ? [] : $mergedItems->toArray();
            
                return $groupedArray;
            }, $groupedTherapies);


            // Combine all therapies into a single array
            $allTherapies = [];
            foreach ($userassignTherapies as $time => $therapy) {

                if ($time == '13:00:00') {
                    $therapy['therapy_name'] = 'Lunch';
                    
                } elseif ($time == '08:00:00') {
                    $therapy['therapy_name'] = 'Breakfast';


                // } elseif ($time == '17:00:00') {
                //     $therapy['therapy_name'] = 'Snacks';

                } elseif ($time == '19:30:00') {
                    $therapy['therapy_name'] = 'Dinner';

                } else {
                    $therapy['therapy_name'] = $therapy['therapy_name'];
                }
                $allTherapies[] = $therapy;
            }

            // Custom comparison function to sort therapies by start time
            usort($allTherapies, function($a, $b) {
                return strtotime($a['start_time']) - strtotime($b['start_time']);
            });

            return response()->json([
                'status_code' => 200,
                'message' => 'daily schedule data',
                'data' =>$allTherapies,
            ],200);

        }else{

            $sorteddefaultData = collect($defData)->sortBy('start_time')->values()->all();
            return response()->json([
                'status_code' => 200,
                'message' => 'daily schedule data',
                'data' =>$sorteddefaultData,
            ],200);

        }

   } catch (\Throwable $th) {
    echo $th->getMessage();
       return response()->json(['status_code' => 500,'message' => 'something went to wrong'], 500);
   }
}


public function dailychart($token =null){

    try {
        $user = JWTAuth::authenticate($token);
        $dailychart = $user->dailychart;
        if(!empty($dailychart)){
           return $dailychart;
        }
        return response()->json(['status_code' => 404,'message' => 'Payment data not found'], 404);
    } catch (\Throwable $th) {
       return response()->json(['status_code' => 500,'message' => 'Something went to wrong'], 500);
   }
}

public function userDiet($token =null){

    try {
        $user = JWTAuth::authenticate($token);
        $dietchart = $user->userDiet;
        if(!empty($dietchart)){
           return $dietchart;
        }
        return response()->json(['status_code' => 404,'message' => 'Payment data not found'], 404);
    } catch (\Throwable $th) {
       return response()->json(['status_code' => 500,'message' => 'Something went to wrong'], 500);
   }
}


public function userdietchart(Request $request){

    try {
        $token = $request->bearerToken();
        $user = JWTAuth::authenticate($token);

        //$userDietchart=  $user->userDetails->dietchart->dietChartItems;
        $userRecomendateDite=  $user->userDetails->dietchart;
        $userAccommodation=  $user->userDetails->accommodation;

        $doctor = ['name'=>'Dr.Abishek Biswas','email'=>'abishek@gmail.com','department'=>4 ,'type'=>'doctor','advice'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eleifend lacus a blandit elementum'];
       // $spacialAdvice = ['name'=>'Dr.Sandeep','email'=>'sandeep@gmail.com','department'=>4, 'type'=>'intern'];

        $userDietchart = User::with(['dietchart.dietChartItems'])->find($user->userDetails->department_id)->toArray();  
    
        $dietchartUnserilize = $userDietchart['dietchart'];
        foreach ($dietchartUnserilize as &$item) {
            
            foreach ($item['diet_chart_items'] as &$chartItem) {
                $chartItem['diet_item_name'] = unserialize($chartItem['diet_item_name']);
            }
    }

    //print_r($dietchartUnseriliz);

    $mydata = (object)[];
    if(!empty($dietchartUnserilize)){
       $mydata =(object) $dietchartUnserilize[0];
    }

        return response()->json([
            'status_code' => 200,
            'message' => 'found user diet chart data',
            'diet_chart' => $mydata,
            'recommended_diet' =>$userRecomendateDite,
            'accommodation' =>$userAccommodation,
            'doctor' =>$doctor

        ],200);
        
    } catch (\Throwable $th) {
        echo 'Error: ' . $th->getMessage();
       return response()->json(['status_code' => 500,'message' => 'Something went to wrong'], 500);
   }
}


public function AppIcone($token =null){
    try {
        $user = JWTAuth::authenticate($token);
        $appicones = AppIcone::select('id','app_type','app_title','app_description','app_icone','status','apptype')->where('status',1)->get();
        if(count($appicones)>0){
           return $appicones;
        }
        return response()->json(['status_code' => 404,'message' => 'Menue data not found'], 404);
    } catch (\Throwable $th) {
       return response()->json(['status_code' => 500,'message' => 'Something went to wrong'], 500);
   }
}

static function Department(){

    try {
        $department = Department::orderBy('id')->skip(1)->take(4)->get();
        if(count($department)>0){
            return $department;
         }
         return response()->json(['status_code' => 404,'message' => 'Department data not found'], 404);

    } catch (\Throwable $th) {
        echo 'Error: ' . $th->getMessage();
        return response()->json(['status_code' => 500,'message' => 'Something went to wrong'], 500);
    }

}


public function langTranslate(Request $request){

       //$currentLocale = app()->getLocale();


    try {

        $language = [
            'login'=>[
                'title' => trans('apilang.title'),
                'login_acoutn' => trans('apilang.login_acoutn'),
                'get_otp' => trans('apilang.get_otp'),
                'mobile_no' => trans('apilang.mobile_no'),
                'otp' => trans('apilang.otp'),
                'valid_phone' => trans('apilang.valid_phone'),
                'valid_otp' => trans('apilang.valid_otp'),
                'opt_sent' => trans('apilang.opt_sent'),
                'otp_verify' => trans('apilang.otp_verify'),
                'mobile' => trans('apilang.mobile'),
                'email' => trans('apilang.email'),
                'success' => trans('apilang.success_login'),
                'success_otp' => trans('apilang.success_otp'),
                'expire_otp' => trans('apilang.expire_otp'),
                'success_update' => trans('apilang.success_update'),
                
            ],
            'logout'=>[
                'success' => trans('apilang.success_logout'),
            ],

            'signup' =>[
                'title' => trans('apilang.sign_up_title'),
                'arogyadhama_related_details' => trans('apilang.arogyadhama_related_details'),
                'label_save' => trans('apilang.label_save'),
                'label_select' => trans('apilang.label_select'),
                'label_country' => trans('apilang.label_country'),
                'label_country_code' => trans('apilang.label_country_code'),
                'atten_language' => trans('apilang.atten_language'),
                'label_full_name' => trans('apilang.label_full_name'),
                'label_age' => trans('apilang.label_age'),
                'label_gender' => trans('apilang.label_gender'),
                'label_mobile' => trans('apilang.label_mobile'),
                'label_whats_no' => trans('apilang.label_whats_no'),
                'label_email' => trans('apilang.label_email'),
                'label_address' => trans('apilang.label_address'),
                'label_addres2' => trans('apilang.label_addres2'),
                'label_city' => trans('apilang.label_city'),
                'label_state' => trans('apilang.label_state'),
                'label_pincode' => trans('apilang.label_pincode'),
                'label_image' => trans('apilang.label_image'),
                'label_language' => trans('apilang.label_language'),
                'label_section' => trans('apilang.label_section'),
                'label_accomudation' => trans('apilang.label_accomudation'),
                'full_name' => trans('apilang.full_name'),
                'age' => trans('apilang.age'),
                'gender' => trans('apilang.gender'),
                'mobile' => trans('apilang.mobile'),
                'whats_no' => trans('apilang.whats_no'),
                'email' => trans('apilang.email'),
                'address' => trans('apilang.address'),
                'addres2' => trans('apilang.addres2'),
                'city' => trans('apilang.city'),
                'state' => trans('apilang.state'),
                'pincode' => trans('apilang.pincode'),
                'country' => trans('apilang.country'),
                'image' => trans('apilang.image'),
                'language' => trans('apilang.language'),
                'section' => trans('apilang.section'),
                'accomudation' => trans('apilang.accomudation'),
                'thank_you' => trans('apilang.thank_you'),
                'success_message' => trans('apilang.success_message'),
                'update_profile' => trans('apilang.update_profile'),
                'edit_profile' => trans('apilang.edit_profile'),
            ],
            'profile_update' =>[
                'label_full_name' => trans('apilang.label_full_name'),
                'label_age' => trans('apilang.label_age'),
                'label_gender' => trans('apilang.label_gender'),
                'label_mobile' => trans('apilang.label_mobile'),
                'label_whats_no' => trans('apilang.label_whats_no'),
                'label_email' => trans('apilang.label_email'),
                'label_address' => trans('apilang.label_address'),
                'label_addres2' => trans('apilang.label_addres2'),
                'label_city' => trans('apilang.label_city'),
                'label_state' => trans('apilang.label_state'),
                'label_pincode' => trans('apilang.label_pincode'),
                'label_country' => trans('apilang.label_country'),
                'label_image' => trans('apilang.label_image'),
                'label_language' => trans('apilang.label_language'),
                'label_section' => trans('apilang.label_section'),
                'label_accomudation' => trans('apilang.label_accomudation'),
                'name' => trans('apilang.name'),
                'age' => trans('apilang.age'),
                'gender' => trans('apilang.gender'),
                'address' => trans('apilang.address'),
                'addres2' => trans('apilang.addres2'),
                'city' => trans('apilang.city'),
                'state' => trans('apilang.state'),
                'pincode' => trans('apilang.pincode'),
                'country' => trans('apilang.country'),
                'image' => trans('apilang.image'),
                'language' => trans('apilang.language'),
                'accomudation' => trans('apilang.accomudation'),
            ],
            'home'=>[
                'welcome' => trans('apilang.welcome'),
                'home_label' => trans('apilang.home_label'),
                'hello_label' => trans('apilang.hello_label'),
                'dialy_chart_label' => trans('apilang.dialy_chart_label'),
                'profile_label' => trans('apilang.profile_label'),
                'more_label' => trans('apilang.more_label'),
            ],

            'landing' =>[
                'yoga' => trans('apilang.yoga'),
                'ayurveda' => trans('apilang.ayurveda'),
                'acupunctures' => trans('apilang.acupunctures'),
                'get_start' => trans('apilang.get_start'),
            ],

            'diet_chart' =>[
                'label_doctor_name' => trans('apilang.label_doctor_name'),
                'label_special_advice' => trans('apilang.label_special_advice'),
                'label_accommodation' => trans('apilang.label_accommodation'),
                'label_details' => trans('apilang.label_details'),
                'label_diet_chart' => trans('apilang.label_diet_chart'),
                'label_no_record' => trans('apilang.label_no_record'),
            ],

            'case_detail' =>[
                'title' => trans('apilang.case_title'),
                'id' => trans('apilang.id'),
                'label_accommodation' => trans('apilang.label_no_record'),
            ],
            
            'treamnet_chart'=>[
                'label_treatment_details' => trans('apilang.label_treatment_details'),
                'section' => trans('apilang.label_section'),
                'label_doctor_name' => trans('apilang.label_doctor_name'),
                'label_special_advice' => trans('apilang.label_special_advice'),
                'label_accommodation' => trans('apilang.label_accommodation'),
                'label_therapy' => trans('apilang.label_therapy'),
                'label_location' => trans('apilang.label_location'),
                'label_day_time' => trans('apilang.label_day_time'),
                'label_doctor' => trans('apilang.label_doctor'),
                'label_prescription' => trans('apilang.label_prescription'),
            ],


            'daily_report' =>[
                'label_weight' => trans('apilang.label_weight'),
                'label_kg' => trans('apilang.label_kg'),
                'label_blood_pressure' => trans('apilang.label_blood_pressure'),
                'label_pulse_rate' => trans('apilang.label_pulse_rate'),
                'label_respiratory_rate' => trans('apilang.label_respiratory_rate'),
            ],

            'payment_history' =>[
                'label_payment_history' => trans('apilang.label_payment_history'),
                'label_no_record_found' => trans('apilang.label_no_record'),
                'label_add_new_payment' => trans('apilang.label_add_new_payment'),
            ],

            'daily_chart' =>[
                'label_daily_chart' => trans('apilang.label_daily_chart'),
                'label_time' => trans('apilang.label_time'),
                'label_no_record_found' => trans('apilang.label_no_record'),
                'label_venue' => trans('apilang.label_venue'),
                'label_language' => trans('apilang.label_language1'),
                'label_section' => trans('apilang.label_section'),
                'label_daily_chart_information' => trans('apilang.label_daily_chart_information'),
                'label_active_treatment' => trans('apilang.label_active_treatment'),
                'label_assigned_treatment' => trans('apilang.label_assigned_treatment'),
                'label_default_treatment' => trans('apilang.label_default_treatment'),
            ],

            'profile' =>[
                'profile_label' => trans('apilang.profile_label'),
                'label_edit' => trans('apilang.label_edit'),
                'label_treatment_details' => trans('apilang.label_treatment_details'),
                'label_gender' => trans('apilang.label_gender'),
                'label_female' => trans('apilang.label_female'),
                'label_male' => trans('apilang.label_male'),
                'label_other' => trans('apilang.label_other'),
                'label_mail_id' => trans('apilang.label_mail_id'),
                'label_age' => trans('apilang.label_age'),
                'label_year_old' => trans('apilang.label_year_old'),
                'label_address' => trans('apilang.label_address1'),
                'label_upload_prescription' => trans('apilang.label_upload_prescription'),
                'label_mobile' => trans('apilang.label_mobile'),
            ],

            'add_payment' =>[
                'label_add_new_payment' => trans('apilang.label_add_new_payment'),
                'select_section' => trans('apilang.select_section'),
                'label_accommodation' => trans('apilang.label_accommodation'),
                'payment_type' => trans('apilang.payment_type'),
                'receipt_number' => trans('apilang.receipt_number'),
                'date_paid' => trans('apilang.date_paid'),
                'payment_amount' => trans('apilang.payment_amount'),
                'label_save' => trans('apilang.label_save'),
                'error_message_section' => trans('apilang.error_message_section'),
                'error_message_accommodation' => trans('apilang.error_message_accommodation'),
                'error_message_payment_mode' => trans('apilang.error_message_payment_mode'),
                'error_message_receipt' => trans('apilang.error_message_receipt'),
                'error_message_date' => trans('apilang.error_message_date'),
                'error_message_amount' => trans('apilang.error_message_amount'),
            ],
            'more_setting'=>[
                'more'=>trans('apilang.more_label'),
                'logout'=>trans('apilang.logout'),
                'are_you_logout'=>trans('apilang.are_you_logout'),
                'cancel'=>trans('apilang.cancel'),
                'arogydhama_svy'=>trans('apilang.arogydhama_svy'),

            ],
            'common'=>[
                'error'=>trans('apilang.error'),
                'camera'=>trans('apilang.camera'),
                'gallery'=>trans('apilang.gallery'),
                'message'=>trans('apilang.message'),
                'ok'=>trans('apilang.ok'),
                'dismiss'=>trans('apilang.dismiss'),
                'ok'=>trans('apilang.ok'),
                'thank_you'=>trans('apilang.thank_you'),
                'details_submit'=>trans('apilang.success_message'),
                'request_id'=>trans('apilang.request_id'),
                'profile_under_review'=>trans('apilang.profile_under_review'),
            ],
            

        ];

        return response()->json([
            'status_code' => 200,
            'status_code' => 'success',
            'data'=>$language,
        ],200);

                   
    } catch (\Throwable $th) {
        return response()->json(['status_code' => 500,'message' => 'Something went to wrong'], 500);
    }

}


public function languageGet(Request $request){
    try {
        
        $token = $request->bearerToken();
        $user = JWTAuth::authenticate($token);
        $lang  = Language::where('status','1')->select('id','name','shortname')->get();
    
        return response()->json([
            'status_code' => 200,
            'status_code' => 'success',
            'data'=>$lang,
        ],200);

    } catch (\Throwable $th) {
        return response()->json(['status_code' => 500,'message' => 'Something went to wrong'], 500);
    }

}


public function changeLanguage(Request $request){

    try {
        $token = $request->bearerToken();
        $user = JWTAuth::authenticate($token);

        $language_id = $request->input('language_id');

        $validator = Validator::make($request->all(), [
            'language_id' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status_code' => 403,
                    'message' => $validator->messages()->first(),
                    'data' => []
            ],403);
        }

        $patientProfile = PatientProfile::where('user_id', $user->id)->first();
        if ($patientProfile) {
            $patientProfile->update(['language_id' => $language_id]);

            return response()->json([
                'status_code' => 200,
                'message' => 'Succesfully updated',
                'data'=>$user,
            ],200);

        }

        
    } catch (\Throwable $th) {
        echo $th->getMessage();
        return response()->json(['status_code' => 500,'message' => 'Something went to wrong'], 500);
    }
}


    public function HomeData(Request $request){


        $token = $request->bearerToken();
        $user = JWTAuth::authenticate($token);

        $userlanguage = $user->userDetails->language->shortname;

        $userlang = $userlanguage ?? 'en';


        if (!UserHelper::checkUserActive($token)){
            return response()->json([
                'status_code' => 200,
                'message'=>'You are inactive',
                'data'=>[]
            ],200);
        }

        $appIcone =  $this->AppIcone($token);
        $slider =  $this->getallSliderdata($userlang);
        $department = $this->Department();
        try {
            $users = User::with([
                'userDetails.language',
                'userDetails.accommodation',
                'userDetails.section',
                ])->find($user->id);

            return response()->json([
                'status_code' => 200,
                'message' => 'found some data for home',
                'data'=>$users,
                'slider' =>$slider,
                'app_menu'=>$appIcone,
                'department'=>$department,
                'token' =>$token

            ],200);

        } catch (\Throwable $th) {
            return response()->json(['status_code' => 500,'message' => 'something went to wrong'], 500);
        }
    }

    public function getNotifications(Request $request){

        $token = $request->bearerToken();
        $user = JWTAuth::authenticate($token);

        try {
           $notifications =  $user->appNotifications;

           if(count($notifications) >0){

            return response()->json([
                'status_code' => 200,
                'message' => 'Some notification found',
                'data' =>$notifications
            ],200);

           }else{
            
            return response()->json([
                'status_code' => 200,
                'message' => 'Notification not found',
                'data' =>[]
            ],200);
           }


        } catch (\Throwable $th) {
            $th->getMessage();
           return response()->json(['status_code' => 500,'message' => 'something went to wrong'], 500);
        }

    }


    public function DailyfoodChart(Request $request){

        $date = $request->input('date');
        $token = $request->bearerToken();
        $user = JWTAuth::authenticate($token);

        $datename = Carbon::createFromFormat('Y-m-d', $date);
        $dayName = $datename->format('l');

        $userVisite = DB::table('user_visits')->where(['patient_id'=>$user->id, 'status'=>'1'])
        ->select('id','patient_id','doctor_id','date','notes','status')->first();

        
       //$departmentName = $user->userDetails->department->name;
        $departmentName =  $user->sectionMaping->section->name;
        $accommodationName = $user->userDetails->accommodation->name;

        if(!empty($userVisite)){
            $visitId = $userVisite->id;
            $specialAdvice = $userVisite->notes;
            $doctor = User::select('name')->find($userVisite->doctor_id);

            // $userDiets = UserDailychart::with('department','doctor','intern','patient','therapy.group','venue')
            //     ->where('user_visit_id', $visitId)
            //     ->where('date', '=', $date)
            //     ->where('department_id', 7)
            //     ->get()->toArray();


            $datename = Carbon::createFromFormat('Y-m-d', $date);
            $dayName = $datename->format('l');
            $weekDay = WeekDay::where('day', $dayName)->first();

            $userDiets = UserDailychart::with('department','doctor','intern','patient','therapy.group','venue')
                ->where('user_visit_id', $visitId)
                ->where('is_day', '=',   $weekDay->id)
                //->orWhere('date', '=',   $date)
                ->where('department_id', 7)
                ->get()->toArray();


               $userDiets = collect($userDiets)->sortBy('start_time')->values()->all();

                $userTherapies =[];
                foreach ($userDiets as $key =>$value) {
                 
                 $userTherapies[$key] = $value['therapy'];
                 unset($userTherapies[$key]['start_time']);
                 unset($userTherapies[$key]['end_time']);
         
                 //Set time for therapy
                 $userTherapies[$key]['start_time'] = $value['start_time'];
                 $userTherapies[$key]['end_time'] = $value['end_time'];
         
                 $userTherapies[$key]['department'] = $value['department'];
                 $userTherapies[$key]['patient'] = $value['patient'];
                 $userTherapies[$key]['doctor'] = $value['doctor'];
                 $userTherapies[$key]['intern'] = $value['intern'];
                 $userTherapies[$key]['venue'] = $value['venue'];
                 $userTherapies[$key]['therapy_name_groups'] = $value['therapy']['group']['name'];
         
                 //set language if exist
                  if (isset($value['language'])) {
                     $userTherapies[$key]['language'] = count($value['language']) > 0 ? $value['language'] : NULL;
                     } else {
                         $userTherapies[$key]['language'] = NULL;
                     }
                }

                function areTimesClose($time1, $time2, $minutesThreshold = 30) {
                    $dateTime1 = strtotime($time1);
                    $dateTime2 = strtotime($time2);
                    $timeDifference = abs($dateTime1 - $dateTime2) / 60; // Difference in minutes
                    return $timeDifference <= $minutesThreshold;
                }
                
                $newData = [];
                
                foreach ($userTherapies as $item) {
                    $foundGroup = false;
                
                    foreach ($newData as &$group) {
                        if (
                            areTimesClose($item['start_time'], $group['start_time']) &&
                            areTimesClose($item['end_time'], $group['end_time'])
                        ) {
                            $group['items'][] = $item['therapy_name'];
                            $foundGroup = true;
                            break;
                        }
                    }
                
                    if (!$foundGroup) {
                        $newItem = $item;
                        $newItem['items'] = [$item['therapy_name']];
                        $newData[] = $newItem;
                    }
                }
                
                $userassignDiets = array_values($newData);



         
                // $therapyGroup = [];
         
                //  foreach ($userTherapies as $key => $value) {
                 
                //      if($value['group']!== null){
         
                //          $therapyGroup[$key] = $value;
                //          unset($therapyGroup[$key]['therapy_name']);
         
                //          $therapyGroup[$key]['therapy_name'] = $value['group']['name'];
         
                //          $therapyGroup[$key]['items'][] = $value['therapy_name'];
         
                //      }else{
                //          $therapyGroup[$key] = $value;
                //      }
                // }
         
             // Convert the array into a Laravel collection
            // $userTherapiesCollection = collect($therapyGroup);
             // Group the collection by 'therapy_name'
             //$groupedTherapies = $userTherapiesCollection->groupBy('therapy_name');
         
             // Transform the grouped collection to merge the 'items' values
            //  $userassignDiets = $groupedTherapies->map(function ($items) {
            //      $mergedItems = $items->pluck('items')->flatten()->unique()->reject(function ($item) {
            //          return $item === null;
            //      })->values();
            //      $firstItem = $items->first();
         
            //      $groupedArray = $firstItem;
            //      $groupedArray['items'] = $mergedItems->isEmpty() ? [] : $mergedItems->toArray();
         
            //      return $groupedArray;
            //  })->values()->toArray();

             //return $userassignDiets;

                if(count($userDiets)>0){
                    return response()->json([
                        'status_code' => 200,
                        'doctor'=>$doctor->name,
                        'special_advice' =>$specialAdvice,
                        'accommodation'=>$accommodationName,
                        'message' => 'found user diet data',
                        'data' => $userassignDiets
                    ],200);
                }

                return response()->json([
                    'status_code' => 200,
                    'message' => 'User diet not assign',
                    'data' =>[]
                ],200);
                
        }else{
            
            //$sectionId = $user->userDetails->section_id;
            $sectionId = $user->sectionMaping->section_id;

            $languageId = $user->userDetails->language_id;
            $defaultdata = DB::table('therapies')
                ->select('id','therapy_name','department_id','group_id','start_time','end_time','therapist_id','section_id','is_default','is_language','default_venue','status','description','order','app_type')
                ->where('status', '1')
                ->where('is_default', 1)
                ->where('department_id', 7)
                ->get()
                ->toArray();
    
            $defData =[];
            foreach ($defaultdata as $key => $value) {
                if ($value->is_language == 1) {
                    $value->language = UserHelper::isLanguage($languageId);
                    $value->venue = UserHelper::isvenueLanguage($languageId);
                }
                if($value->section_id >0){
                    $value->section = UserHelper::isSection($sectionId);
                }
                if($value->default_venue >0){
                    $value->venue = UserHelper::defaultVenu($value->default_venue);
                }
    
                $defData[] = $value;
            }
            
            //return $defData;
            $sorteddefaultDiet = collect($defData)->sortBy('start_time')->values()->all();

                if(count($sorteddefaultDiet)>0){
                    return response()->json([
                        'status_code' => 200,
                        'doctor'=>"",
                        'special_advice' =>"",
                        'accommodation'=>$accommodationName,
                        'message' => 'found user diet data',
                        'data' => $sorteddefaultDiet
                    ],200);
                }

                return response()->json([
                    'status_code' => 200,
                    'message' => 'User diet not assign',
                    'data' =>[]
                ],200);


        }

    }

    public function notificationStatus(Request $request){

        $token = $request->bearerToken();
        $user = JWTAuth::authenticate($token);
        $data = $user->UserDeviceToken;
        $notificationIs = $request->input('notificationIs');

        $validator = Validator::make($request->all(), [
            'notificationIs'=> 'required|in:0,1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status_code' => 403,
                    'message' => $validator->messages()->first(),
                    'data' => []
            ],200);
        }


        try {

            if (!empty($data)) {
                $result = DB::table('user_device_tokens')
                    ->where('user_id', $user->id)
                    ->update(['notification_ison' => $notificationIs]);
            
                if ($result) {
                    $dataupdated = DB::table('user_device_tokens')
                        ->select('id','user_id','device_type','notification_ison')
                        ->where('user_id', $user->id)
                        ->first();
            
                    return response()->json([
                        'status_code' => 200,
                        'message' => 'success',
                        'data' => $dataupdated
                    ], 200);
                } else {
                    return response()->json([
                        'status_code' => 200,
                        'message' => 'not update',
                        'data' => $data
                    ], 200);
                }
            }   

        } catch (\Throwable $th) {
            return response()->json(['status_code' => 500,'message' => 'something went to wrong'], 500);
        }
    }


    public function defaultdailygeneralchart($sectionId){

        try {

            $datetherapy = date('Y-m-d');
            $datename = Carbon::createFromFormat('Y-m-d', $datetherapy);
            $dayName = $datename->format('l');

            $defaultdailyChart = PatientDefaultDailyChart::select(
                'id',
                'therapy_name',
                'department_id',
                'group_id',
                'start_time',
                'end_time',
                'therapist_id',
                'section_id',
                'is_default',
                'is_language',
                'is_day',
                'default_venue',
                'description',
                'app_type',
                'order',
                )->where('status', '1')
                ->where(function ($query) use ($dayName) {
                    $query->where('is_day', $dayName)
                        ->where('is_default', 0);
                })
                ->orWhere('is_default', 1)
                ->get()
                ->toArray();

                $location = Language::select('id','name','description')->where('status','1')->get();
        
                $chartotherpatientFilter = [];
                foreach ($defaultdailyChart as $key => $chart) {
                    $chartotherpatientFilter[$key] = $chart;
        
                    if($chart['section_id'] >0){
                        $chartotherpatientFilter[$key]['sections'] = UserHelper::getTherapySectionwise($chart['section_id'], $sectionId);
                    }
                    if($chart['is_language'] >0){
                        $chartotherpatientFilter[$key]['languages'] = UserHelper::getTherapyLanguagewise($chart['is_language']);
                    }
                    if($chart['default_venue'] >0){
                        $chartotherpatientFilter[$key]['default_venue'] = UserHelper::getTherapyDefaultVenu($chart['default_venue']);
                    }
                    if($chart['default_venue'] ===0){
                        unset($chartotherpatientFilter[$key]['default_venue']);
                    }
                }

               return response()->json([
                'status_code' => 200,
                'message' => 'Patient default daily chart',
                'venue'=> $location,
                'data' =>$chartotherpatientFilter
            ], 200);


        } catch (\Throwable $th) {
            return response()->json(['status_code' => 500,'message' => 'Some things went to wrong'], 500);
        }


    }


}
