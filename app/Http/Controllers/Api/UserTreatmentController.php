<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use JWTAuth;
use App\Models\User;
use App\Models\UserVisit;
use App\Models\Therapist;
use Illuminate\Support\Collection;
use App\Models\UserDailychart;
use App\Models\UserDailyReport;
use App\Models\WeekDay;
use App\Helpers\UserHelper;
use Carbon\Carbon;

class UserTreatmentController extends Controller
{
    public function usertreatment(Request $request){

        try {

            $token = $request->bearerToken();
            $user = JWTAuth::authenticate($token);
            $date = $request->input('date');

            if (!UserHelper::checkUserActive($token)){
                return response()->json([
                    'status_code' => 200,
                    'message'=>'You are inactive',
                    'data'=>[]
                ],200);
            }

           $userVisite = DB::table('user_visits')->where(['patient_id'=>$user->id, 'status'=>'1'])
                ->select('id','patient_id','doctor_id','date','notes','status')->first();
                
            //$departmentName = $user->userDetails->department->name;
            $departmentName = $user->sectionMaping->section->name;
            $accommodationName = $user->userDetails->accommodation->name;

            if(!empty($userVisite)){
                $visitId = $userVisite->id;
                $specialAdvice = $userVisite->notes;
                $doctor = User::select('name')->find($userVisite->doctor_id);

                $datename = Carbon::createFromFormat('Y-m-d', $date);
                $dayName = $datename->format('l');
                $weekDay = WeekDay::where('day', $dayName)->first();

                $userTherapy = UserDailychart::with('department','doctor','intern','patient','therapy.group','venue')
                    ->where('user_visit_id', $visitId)
                    //->where('date', '<=', $date)
                    ->where('is_day', '=', $weekDay->id)
                    ->where('is_default',0)
                    ->whereNotIn('department_id', [7])
                    ->get()->toArray();


                    $groupedTherapies = array();

                    foreach ($userTherapy as $item) {

                        $date = $item['date'];
                        $therapyName['name'] = $item['therapy']['therapy_name'];
                        $therapyName['start_time'] = $item['start_time'];
                        $therapyName['end_time'] = $item['end_time'];
                        $therapyName['prescription_medicine'] = $item['precaution_medicine'];
                        $therapyName['therapy_doctor'] = $item['doctor']['firstname'];
                        $therapyName['venue'] = $item['venue'];
                    
                        if (!isset($groupedTherapies[$date])) {
                            $groupedTherapies[$date] = array(
                                'date' => $date,
                                'therapy_name' => array($therapyName)
                            );
                        } else {
                            $groupedTherapies[$date]['therapy_name'][] = $therapyName;
                        }
                    }

                    usort($groupedTherapies, function ($a, $b) {
                        return strtotime($a['date']) - strtotime($b['date']);
                    });
                    
                    $groupedTherapies = array_values($groupedTherapies);

                    return response()->json([
                        'status_code' => 200,
                        'department'=>$departmentName,
                        'doctor'=>$doctor->name,
                        'special_advice' =>$specialAdvice,
                        'accommodation'=>$accommodationName,
                        'message' => 'found user treatment data',
                        'data' =>$groupedTherapies
                    ],200);
            }else{

                return response()->json([
                    'status_code' => 404,
                    'message' => 'User treatment not found',
                    'data' =>[]
                ],404);
            }

        } catch (\Throwable $th) {
            echo  $th->getMessage();
            return response()->json(['status_code' => 500,'message' => 'Something went to wrong'], 500);
        }

    }


    public function departmentWiseChart(Request $request){

        try {
            
            $token = $request->bearerToken();
            $user = JWTAuth::authenticate($token);
            $date = $request->input('date');
            $departmentId = $request->input('department_id');

            if (!UserHelper::checkUserActive($token)){
                return response()->json([
                    'status_code' => 200,
                    'message'=>'You are inactive',
                    'data'=>[]
                ],200);
            }

           $userVisite = DB::table('user_visits')->where(['patient_id'=>$user->id, 'status'=>'1'])
                ->select('id','patient_id','doctor_id','date','notes','status')->first();

            $departmentName = $user->sectionMaping->section->name;
            $accommodationName = $user->userDetails->accommodation->name;

            if(!empty($userVisite)){
                $visitId = $userVisite->id;
                $specialAdvice = $userVisite->notes;
                $doctor = User::select('name')->find($userVisite->doctor_id);

                $datename = Carbon::createFromFormat('Y-m-d', $date);
                $dayName = $datename->format('l');
                $weekDay = WeekDay::where('day', $dayName)->first();

                $userTherapy = UserDailychart::with('department','doctor','intern','patient','therapy.group','venue')
                    ->where('user_visit_id', $visitId)
                    //->where('date', '<=', $date)
                    ->where('is_day', '<=', $weekDay->id)
                    ->where('is_default',0)
                    ->where('department_id', $departmentId)
                    ->get()->toArray();


                    $groupedTherapies = array();

                    foreach ($userTherapy as $item) {

                        $date = $item['date'];
                        $therapyName['name'] = $item['therapy']['therapy_name'];
                        $therapyName['start_time'] = $item['start_time'];
                        $therapyName['end_time'] = $item['end_time'];
                        $therapyName['prescription_medicine'] = $item['precaution_medicine'];
                        $therapyName['therapy_doctor'] = $item['doctor']['firstname'];
                        $therapyName['venue'] = $item['venue'];
                    
                        if (!isset($groupedTherapies[$date])) {
                            $groupedTherapies[$date] = array(
                                'date' => $date,
                                'therapy_name' => array($therapyName)
                            );
                        } else {
                            $groupedTherapies[$date]['therapy_name'][] = $therapyName;
                        }
                    }

                    usort($groupedTherapies, function ($a, $b) {
                        return strtotime($a['date']) - strtotime($b['date']);
                    });
                    
                    $groupedTherapies = array_values($groupedTherapies);


                    if(!empty($groupedTherapies)){

                        return response()->json([
                            'status_code' => 200,
                            'department'=>$departmentName,
                            'doctor'=>$doctor->name,
                            'special_advice' =>$specialAdvice,
                            'accommodation'=>$accommodationName,
                            'message' => 'found user treatment data',
                            'data' =>$groupedTherapies
                        ],200);
                    }else{

                        return response()->json([
                            'status_code' => 404,
                            'message' => 'Selected department therapy not found',
                            'data' =>[]
                        ],404);
                    }
            }else{

                return response()->json([
                    'status_code' => 404,
                    'message' => 'User treatment not found',
                    'data' =>[]
                ],404);
            }



        } catch (\Throwable $th) {
            echo  $th->getMessage();
            return response()->json(['status_code' => 500,'message' => 'Something went to wrong'], 500);
        }
    }


    public function dailyReport(Request $request){

        try {
            
            $token = $request->bearerToken();
            $user = JWTAuth::authenticate($token);
            $date = $request->input('date');

            $userviteId = DB::table('user_visits')->where('patient_id',$user->id)->select('id','patient_id','doctor_id')->first();


            if(!empty($userviteId)){
                    
                $userDailyReports = DB::table('user_daily_reports')
                ->where('user_id', $user->id)
                ->where('user_visit_id', $userviteId->id)
                ->where('date', '<=', $date)
                ->select('id','user_id','weight','bp_up','bp_down','pulse','respiratory_rate','diastolic_pressure','bhramari_time','bmi','medications','remarks','date','user_visit_id','status')
                ->orderBy('date', 'DESC')
                ->get();

                    $users = User::with([
                        'userDetails.department',
                        'userDetails.language',
                        'userDetails.accommodation',
                        'userDetails.section',
                        ])->find($user->id);

                if(count($userDailyReports) >0){                
                    return response()->json([
                        'status_code' => 200,
                        'message' => 'found user treatment data',
                        'data' =>[
                            'treatment_title'=>'Daily report',
                            'treatment_text'=>'Previous report',
                            'weight'=>'Kg',
                            'bp'=>'Systolic Blood Pressure',
                            'pulse'=>'Pulse Rate',
                            'respiratory_rate'=>'Respiratory Rate',
                            'bhramari_time'=>'Bhramari time',
                            'bmi'=>'BMI',
                            'medications'=>'Medications',
                            'remarks'=>'Remarks',
                            'diastolic_pressure'=>'Diastolic pressure',
                            'user_daily_reports'=>$userDailyReports,
                        ]
                    ],200);
                }else{
                    return response()->json([
                        'status_code' => 200,
                        'message' => 'User treatment not found',
                        'data' =>[
                            'treatment_title'=>'Daily report',
                            'treatment_text'=>'Previous report',
                            'user_daily_reports'=>[],
                            
                        ]
                    ],200);
                }
                
            }else{

                return response()->json([
                    'status_code' => 200,
                    'message' => 'User treatment not found',
                    'data' =>[
                        'treatment_title'=>'Daily report',
                        'treatment_text'=>'Previous report',
                        'user_daily_reports'=>[],
                        
                    ]
                ],200);

            }

        } catch (\Throwable $th) {
            echo $th->getMessage();
            return response()->json(['status_code' => 500,'message' => 'Something went to wrong'], 500);
        }

    }
}
