<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use DB;
use JWTAuth;
use App\Models\User;
use App\Models\CaseDetail;
use App\Models\Payment;
use App\Models\Department;
use App\Models\Accommodation;
use App\Models\PaymenMode;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Helpers\UserHelper;
use App\Models\UserDailychart;
use App\Models\Section;
use App\Models\PaymentDetail;


class CasedetailController extends Controller
{
    
    public function CaseDetails(Request $request){

       try {
        $token = $request->bearerToken();
       $user = JWTAuth::authenticate($token);

        // $caseDetails = CaseDetail::select('id','user_id','doctor_id','ipsection_id','chief_complaints','medical_history','final_diagnosis','date')
        // ->where('user_id',$user->id)->first();

       //$caseDetails = CaseDetail::with('user', 'doctor')->where('user_id',  $user->id)->get()->toArray();

       $caseDetails = CaseDetail::with('user', 'doctor')->where('user_id',  $user->id)->latest()->first();


            $details = [];
            $details[] = array('title' => "Chief complaints", 'description' => $caseDetails->chief_complaints ?? '');
            $details[] = array('title' => "Treatment History", 'description' => $caseDetails->medical_history ?? '');
            $details[] = array('title' => "Final diagnosis", 'description' => $caseDetails->final_diagnosis ?? '');
            $details[] = array('title' => "History of Present Illness", 'description' => $caseDetails->history_present_illness ?? '');

            $newcaseDetail = $caseDetails;
            $newcaseDetail['details_list'] = $details;

        if(!empty($caseDetails)){

            return response()->json([
                'status_code' => 200,
                'message' => 'User case details data',
                'data' =>[
                    'chief_complaints'=> "Chief complaints",
                    'medical_history'=> "Medical history",
                    'final_diagnosis'=> "Final diagnosis",
                    'case_details'=>$newcaseDetail 
                ]
            ],200);
            
        }
        return response()->json([
            'status_code' => 404,
            'message' => 'User case details not found',
            'data' =>[
                'case_details'=>[] 
            ]
            
        ],404);


       } catch (\Throwable $th) {
        echo $th->getMessage();
        return response()->json(['status_code' => 500,'message' => 'Something went to wrong'], 500);

       }
    }

    public function Payment(Request $request){
        
        try {

            $token = $request->bearerToken();
            $user = JWTAuth::authenticate($token);

            Carbon::macro('startOfTuesdayWeek', function () {
                return $this->startOfWeek()->addDays(2);
            });

            $startDate = Carbon::now()->startOfTuesdayWeek();
            $endDate = $startDate->copy()->addDays(6);

            $validator = Validator::make($request->all(), [
                'department' => 'required',
                'accommodation' => 'required',
                'payment_type' => 'required',
                'recept_no'=> 'required|unique:payments',
                'payment_date'=> 'required',
                'price'=> 'required',
            ]);
    
            if($validator->fails()) {
                return response()->json([
                    'status_code' => 403,
                        'message' => $validator->messages()->first(),
                        'data' => []
                ],403);
            }

            $payment = new Payment;
            $payment->user_id = $user->id;
            $payment->user_email = $user->email;
            $payment->price = $request->input('price');
            $payment->type = $request->input('payment_type');;
            $payment->recept_no = $request->input('recept_no');
            $payment->approve_by = null;
            $payment->approved_on = $request->input('payment_date');
            $payment->department_id = $request->input('department');
            $payment->accommodation_id = $request->input('accommodation');

            if ($payment->save()) {

                return response()->json([
                    'status_code' => 200,
                    'message' => 'Payment details successfully saved',
                    'data'=>[]             
                ],200);

            } else {
                return response()->json([
                    'status_code' =>500,
                    'message' => 'Failed to save data!',
                    'data'=>[]             
                ],500);
            }

        } catch (\Throwable $th) {
            echo  $th->getMessage();
            return response()->json(['status_code' => 500,'message' => 'Something went to wrong'], 500);
        }
    }

    public function paymentWeekly(Request $request){

        try {

            $token = $request->bearerToken();
            $user = JWTAuth::authenticate($token);

           $userviteId = DB::table('user_visits')->where('patient_id',$user->id)
            ->select('id','patient_id','doctor_id','date','notes','status')->first();

           $payment = Payment::with(['section', 'department', 'accommodation', 'paymenmode'])
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get()->toArray();

            // $weeklyGroups = [];

            // foreach ($payment as $key=>$item) {

            //     $approvedOn = Carbon::parse($item['approved_on']);
            //     $approvedOn->startOfWeek(Carbon::TUESDAY);
                
            //     //$weekNumber = $approvedOn->format('W');
            //     $weekNumber = $approvedOn->format('Y-m-d');
                
            //     if (!isset($weeklyGroups[$weekNumber])) {
            //         $weeklyGroups[$weekNumber] = [];
            //     }
                
            //     //$weeklyGroups[$weekNumber][] = $item['department']['name'];
            //     $weeklyGroups[$weekNumber][] = $item['section']['name'];
                
            // }

            
            // $weekNo = array_keys($weeklyGroups);

            // $weeklypayment = [];
            // $i = 0;
            // foreach ($weeklyGroups as $weekRange => $payofdepartment) { 

            //    $index = array_search($weekRange, $weekNo);

            //     if ($index !== false) {
            //         $weekNumber = $weekNo[$index];
            //         $weeklypayment[$i]['week'] = "Week ".$index+1;
            //         $weeklypayment[$i]['date'] = $weekNumber;
            //         $weeklypayment[$i]['section'] = $payofdepartment;


            //        $accommodationData = [];
            //        foreach ($payment as $key => $item) {
            //            $approvedOn = Carbon::parse($item['approved_on'])->format('Y-m-d');
            //            if (Carbon::parse($approvedOn)->tz('UTC')->isSameWeek(Carbon::parse($weekNumber)->tz('UTC'))) {
            //                $accommodationData[$key] = $item['accommodation']['name'];
            //            }
            //        }
                   
            //        $weeklypayment[$i]['accommodation'] = implode(', ', $accommodationData);

            //     }
            //     $i++;
            // }

            $weeklypayment = [];

            foreach ($payment as $key => $value) {
                $weeklypayment[$key]['section'] = $value['section']['name'];
                $weeklypayment[$key]['accommodation'] = $value['accommodation']['name'];
                $weeklypayment[$key]['payment_type'] = $value['paymenmode']['name'];
                $weeklypayment[$key]['recept_no'] = $value['recept_no'];
                $weeklypayment[$key]['date_paid'] = $value['approved_on'];
                $weeklypayment[$key]['amount'] = $value['price'];
            }


            return response()->json([
                'status_code' => 200,
                'message' => 'Payment details',
                'week_title' =>'Week',
                'payment_title' =>'Done',
                'data'=>$weeklypayment           
            ],200);


        }catch (\Throwable $th) {

            echo  $th->getMessage();
            return response()->json(['status_code' => 500,'message' => 'Something went to wrong'], 500);
        }

    }


    public function UserprofileDetails(Request $request, $weeklyPayment=null){
        
        try {

            $token = $request->bearerToken();
            $user = JWTAuth::authenticate($token);
            $userData = User::with(['userDetails.department'])->find($user->id);

            
           $userviteId = DB::table('user_visits')->where('patient_id',$user->id)
           ->select('id','patient_id','doctor_id','date','notes','status')->first();
    
    
           if(!empty($userviteId)){
            $visitId = $userviteId->id;
            $date  = $userviteId->date;


            $newDate = date('Y-m-d', strtotime($date . ' +1 week'));
            $today = Carbon::now()->format('Y-m-d');

            $userTherapyDepartment = UserDailychart::with('department')
                ->where('user_visit_id', $visitId)
                //->whereDate('date', '<=', $today)
                ->get()->toArray();
           }

    
        // Get data weekly
        $weeklyArray = [];
        $startDate = strtotime($userviteId->date); // Start on created visite date
        
        foreach ($userTherapyDepartment as $appointment) {
            $date = strtotime($appointment['date']);

            //Check if the appointment date is after the start date and is a Tuesday or later

            if ($date >= $startDate && date('N', $date) >= 2) {
                $weekNumber = date('W', $date);
        
                if (!isset($weeklyArray[$weekNumber])) {
                    $weeklyArray[$weekNumber] = [];

                }
        
                $weeklyArray[$weekNumber][] = $appointment;
            }
        }
        
        //Sort the array by keys (week numbers) in ascending order
        ksort($weeklyArray);
        //Reset array keys to start from 0
        $weeklyArray = array_values($weeklyArray);

        // echo "<pre>";
        // print_r($weeklyArray);
        // die;

        // Get data unique department weekly (array indexing)
        $uniqueDepartments = array();
        foreach ($weeklyArray as $key=>$entry) {
            foreach ($entry as $value) {
                if (isset($value['department']) && is_array($value['department']) && isset($value['department']['name'])){
                    $departmentName = $value['department']['name'];
                    if (!in_array($departmentName, $uniqueDepartments)) {
                        $uniqueDepartments[$key][] = $departmentName;
                    }
                }
            }
            $uniqueDepartments[$key]['week'] = "Week ".$key+1;
            $uniqueDepartments[$key]['date'] = $entry[0]['date'];
        }

        // Array reindexing 
        $uniqueWeeklyDepartments = [];
        foreach ($uniqueDepartments as $week) {
            $uniqueDepartments = array_unique($week);
            $uniqueWeeklyDepartments[] = array_merge(array_intersect_key($week, ['week' => '', 'date' => '']), $uniqueDepartments);
        }

        $treatmentDepartment = [];
        foreach ($uniqueWeeklyDepartments as $week) {
            $newWeek = [
                'week' => $week['week'],
                'date' => $week['date'],
                'treatment' => array_slice($week, 2)
            ];
            $treatmentDepartment[] = $newWeek;
        }

           $data = [];
           $data['profile'] = $userData;
           $data['treatment_department'] = $treatmentDepartment;

           return response()->json([
            'status_code' => 200,
            'message' => 'Profile  details',
            'week_title' =>'Week',
            'summary_title' =>'View Summary',
            'date' =>$date,
            'data'=>$data           
        ],200);


        } catch (\Throwable $th) {
            
            echo  $th->getMessage();
            return response()->json(['status_code' => 500,'message' => 'Something went to wrong'], 500);
        }
    }

    public function PaymentDropdownOption(Request $request){


       $department = Section::select('id','name','description','icon','status')->get();
       $accommodation = Accommodation::select('id','name','description','status')->get();
       $paymentmode = PaymenMode::select('id','name','status')->get();
       $data = [];

       $data['department'] = $department;
       $data['accommodation'] = $accommodation;
       $data['paymentmode'] = $paymentmode;
       $data['paymentdetails'] = $this->paymentDetails();

        return response()->json([
            'status_code' => 200,
            'message' => 'found department',
            'data' =>$data,
        ], 200);

    }

    public function paymentDetails(){
        try {
            return $paymentdetails = PaymentDetail::orderBy('id','DESC')->select('id','payment_detail_name','price','department_id','status')->where('status','1')->get();
        } catch (\Throwable $th) {
            echo  $th->getMessage();
            return response()->json(['status_code' => 500,'message' => 'Something went to wrong'], 500);
        }
    }



}
