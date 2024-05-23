<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Therapist;
use App\Models\UserVisit;
use App\Models\Department;
use App\Models\Therapy;
use App\Models\Venue;
use App\Models\Doctor;
use App\Models\DietItem;
use App\Models\Group;
use DB;
use Carbon\Carbon;
use App\Models\Slider;
use App\Models\AppIcone;
use App\Models\UserDailychart;
use App\Models\UserDailyReport;
use App\Models\CaseDetail;
use App\Models\Language;
use App\Models\Intern;
use App\Helpers\UserHelper;

class UserscheduleController extends Controller
{
    
    public function userSchedule(Request $request, $id){

        if(!Auth::check()){
            return redirect('/');
        }

        $patient = user::find($id);
        $doctor = Doctor::where('status', '1')->get();
        $departments = Department::where('status', '1')->get();
        $groups = Group::where('status', '1')->get();
        $intern = Intern::where('status', '1')->get();
        $therapist = Therapist::where('status', '1')->get();

        $userViste = DB::table('user_visits')->select('id','patient_id','doctor_id','date')->where('patient_id', $id)->first();

        if(!empty($userViste)){
        $userVisteid = $userViste->id;
        $userTherapy = UserDailychart::with('department','patient','therapy.group','doctor','intern','venue')
                    ->where(['user_visit_id'=>$userVisteid, 'is_default'=>0])
                    ->orderBy('id', 'desc')
                    ->get()->toArray();
        }else{
            $userTherapy = [];
        }

        return view('admin.userschedule')->with([
            'patient'=>$patient,
            'doctors'=>$doctor,
            'departments'=>$departments,
            'userTherapy'=>$userTherapy,
            'groups' =>$groups,
            'interns' =>$intern,
            'therapists' =>$therapist,
            'page_type'=>'admin',
            'route_type'=>'schedule'
        ]);
    }

    public function userVisite(Request $request){

        $data = $request->all();
        $visit_date = array_filter(array_map('trim', $data['visit_date']));
        $doctor = array_filter(array_map('trim', $data['doctor']));
        $intern = array_filter(array_map('trim', $data['intern']));
        $tharapist = array_filter(array_map('trim', $data['tharapist']));
        $notes = array_filter(array_map('trim', $data['notes']));

        if (empty($visit_date && $doctor && $intern && $tharapist && $notes)) {
           return redirect()->back()->with('message', 'Some data is empty please check again');

        } else {
           
           foreach($data['visit_date'] as $key=>$visiteData){
                $dateVisit = $visiteData;
                $doctor = $data['doctor'][$key];
                $intern = $data['intern'][$key];
                $tharapist = $data['tharapist'][$key];
                $notes = $data['notes'][$key];
                $week = $data['week'];
                $patient = $data['patientId'];
                DB::table('user_visits')->insert([
                    'date' => $dateVisit,
                    'doctor_id' => $doctor,
                    'intern_id' => $intern,
                    'patient_id' => $patient,
                    'therapist_id' => $tharapist,
                    'week_number' => $week,
                    'notes' => $notes,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
               
           }
           return redirect()->back()->with('success', 'Your data saved');

        }
        exit();

    }

    public function getTharapistWithdepartment(Request $request){

        if ($request->ajax()) {
            $depId = $request->input('id');
            $userId = $request->input('userId');
            
             $userVisits = UserVisit::where('patient_id',$userId)->select('id','date')->get()->toArray();

            $therapywithDepartment ="";

            if($depId =="all"){
                $therapywithDepartment = Therapy::get();
            }else{
                $therapywithDepartment = Therapy::where('department_id', $depId)->get();
            }

            return response()->json([
                'status_code' => 200,
                'data' =>$therapywithDepartment,
                'userVisits'=>$userVisits
            ],200);

        }else{

           return response()->json([
            'status_code' => 419,
            'message' => 'Request is not valid',
            ],419);
        }
    }


    public function userTharapy(Request $request){


        $data = $request->all();

        if(isset($data) && !empty($data)){

            foreach ($data as $key => $dataValue) {

                if (is_array($dataValue) || is_object($dataValue)) {

                    foreach ($dataValue as $innerKey => $value) {

                        DB::table('user_therapies')->insert([
                            'therapy_id' =>$value,
                            'user_visit_id' =>(int)$key,
                            'venue_id' =>1,
                            'status' => 1,
                            'app_type' =>1,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);

                    }

                } 
            }

            return redirect()->back()->with('success', 'tharapy data saved');
        }else{
             return redirect()->back()->with('message', 'Some data is empty please check again');
        }
    }


public function userDiets(Request $request){

        $data = $request->all();  

        if(isset($data) && !empty($data)){

            foreach ($data as $key => $dataValue) {

                if (is_array($dataValue) || is_object($dataValue)) {

                    foreach ($dataValue as $innerKey => $value) {

                       //echo "Key2: " . $innerKey . ", Value2: " . $value . '<br>';

                        DB::table('user_diets')->insert([
                            'diet_item_id' =>$value,
                            'user_visit_id' =>(int)$key,
                            'venue_id' =>1,
                            'status' => 1,
                            'app_type' =>2,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);

                    }

                } 
            }

            return redirect()->back()->with('success', 'user diet data saved');
        }else{
             return redirect()->back()->with('message', 'Some data is empty please check again');
        }
    }


    public function userTreatmentpdfUploadfile(Request $request){

        $data = $request->all();
        $files = $request->file('files');

        $request->validate([
            'files.*' => 'required|file|max:2048', // Adjust the validation rules as needed
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $fileName = $originalName . '-' . uniqid() . '.' . $file->extension();
                $path_img = "pdfs/usertreatment";
                $file->move($path_img, $fileName);

                DB::table('user_treatment_pdfuploads')->insert([
                    'user_id' =>5,
                    'email' =>'demo@gmail.cm',
                    'treatment_pdf' =>$fileName,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

            }
        } else {
            return redirect()->back()->with('success', 'Please select any file.');
        }

        return redirect()->back()->with('success', 'Files uploaded successfully.');
    }



    public function usertherapyschedule(Request $request){
        if ($request->ajax()){
            $data = $request->all();
            $doctorId = $data['doctor_id'];
            $selectedDoctor = Doctor::where('id', $doctorId)->get();

            return response()->json(['status'=>true,'page_type'=>'admin','view'=>(String)View::make('admin.userstherapy')
            ->with(compact('selectedDoctor'))]);
        }
    }


    public function patientscheduleAssign(Request $request){

        if ($request->ajax()){

           $data = $request->all();
           
           //$visitDate = $data['visiteDate'];
           $patientId = $data['patientId'];
           $doctorId = $data['doctorId'];
           $starttime = $data['starttime'];
           $endtime = $data['endttime'];
           $therapyDepartment = $data['therapyDepartment'];
           $therapyId = $data['therapyId'];
           $venu = $data['departMentVenu'];
           $therapistdoctor = $data['therapistdoctor'];
           $intern = $data['intern'];
           $checkboxValues = $data['checkboxValues'];
           $notes = $data['notes'];
           $medicine = $data['medicine'];

           $userViste = DB::table('user_visits')->where('patient_id', $patientId)->count();

           $titlenotification = "Therapy";
           $msg = "Added therapy in your daily chart";

        //    $visitCarbonDate = Carbon::parse($visitDate);
        //    $oneDayAgo = $visitCarbonDate->subDay()->format('Y-m-d');

           DB::beginTransaction();

        try {

            if($userViste >=1){
            $userViste = DB::table('user_visits')->select('id','patient_id','doctor_id','date')->where('patient_id', $patientId)->first();
            $userVisteid = $userViste->id;

            $visitCarbonDate = Carbon::parse($userViste->date);
            $oneDayAgo = $visitCarbonDate->subDay()->format('Y-m-d');

                foreach ($checkboxValues as $key=>$day){

                    if($day >0){

                        $startWeek = Carbon::now()->startOfWeek();
                        $therapyDate = $startWeek->addDays($day)->toDateString();

                       
                        //Check therapy time slot if already booked
                            $timeStatus = $this->checkTimeSloat($patientId, $therapyDate, $starttime, $endtime);

                           if ($data['is_confirm'] == 0 && $timeStatus >= 1) {
                                DB::rollback();
                                $userTherapy = UserDailychart::with('department','patient','therapy.group','doctor','intern','venue')
                                    ->where(['user_visit_id'=>$userVisteid, 'is_default'=>0])
                                    ->orderBy('id', 'desc')
                                    ->get()->toArray();
                                $therapyDate = Carbon::parse($therapyDate)->format('Y-m-d');
                                return response()->json([
                                    'status'=>409, 
                                    'message' => "The system does not allow to assigne therapy as given date $therapyDate and time $starttime to $endtime",
                                    'continueDate' =>$therapyDate,
                                    'page_type'=>'admin',
                                    'view'=>(String)View::make('admin.userstherapy')->with(compact('userTherapy'))], 200);
                                break;
                            }


                        DB::table('user_dailycharts')->insert([
                            'patient_id' => $patientId,
                            'user_visit_id' => $userVisteid,
                            'department_id' => $therapyDepartment,
                            'daily_notes' => $notes,
                            'precaution_medicine' => $medicine,
                            'date' => $therapyDate,
                            'start_time' => $starttime,
                            'end_time' => $endtime,
                            'therapy_id' => $therapyId,
                            'doctor_id' => $doctorId,
                            'intern_id' => $intern,
                            'is_day' => $day,
                            'therapist_id' => $therapistdoctor,
                            'venue_id' => $venu,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);

                    }
                    
                }

                DB::commit();

                UserHelper::sendNotification($patientId, $msg, $titlenotification);

                $userTherapy = UserDailychart::with('department','patient','therapy.group','doctor','intern','venue')
                    ->where(['user_visit_id'=>$userVisteid, 'is_default'=>0])
                    ->orderBy('id', 'desc')
                    ->get()->toArray();


                return response()->json(['status'=>200, 'message' => 'Assigned the therapy to the patient', 'page_type'=>'admin','view'=>(String)View::make('admin.userstherapy')
            ->with(compact('userTherapy'))], 200);

           }else{

               $insertedId = DB::table('user_visits')->insertGetId([
                    'patient_id' => $patientId,
                    'doctor_id' => $doctorId,
                    'date' => $visitDate,
                    'notes' => $notes,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);


                foreach ($checkboxValues as $key=>$day){

                    if($day >0){

                        /*$days = $day-1;
                        $visitCarbondate = Carbon::parse($visitDate);
                        $therapyDate = $visitCarbondate->addDays($days);*/


                        $startWeek = Carbon::now()->startOfWeek();
                        $therapyDate = $startWeek->addDays($day)->toDateString();


                        //Check therapy time slot if already booked
                            $timeStatus = $this->checkTimeSloat($patientId, $therapyDate, $starttime, $endtime);
                             if ($data['is_confirm'] == 0 && $timeStatus >= 1) {

                             DB::rollback();

                            $userTherapy = UserDailychart::with('department','patient','therapy.group','doctor','intern','venue')
                                ->where(['user_visit_id'=>$userVisteid, 'is_default'=>0])
                                ->orderBy('id', 'desc')
                                ->get()->toArray();
                            $therapyDate = Carbon::parse($therapyDate)->format('Y-m-d');
                            return response()->json([
                                'status'=>409, 
                                'message' => "The system does not allow to assigne therapy as given date $therapyDate and time $starttime to $endtime", 
                                'page_type'=>'admin',
                                'view'=>(String)View::make('admin.userstherapy')->with(compact('userTherapy'))], 200);
                             break;
                            }


                        DB::table('user_dailycharts')->insert([
                            'patient_id' => $patientId,
                            'user_visit_id' => $insertedId,
                            'department_id' => $therapyDepartment,
                            'daily_notes' => $notes,
                            'precaution_medicine' => $medicine,
                            'date' => $therapyDate,
                            'start_time' => $starttime,
                            'end_time' => $endtime,
                            'therapy_id' => $therapyId,
                            'doctor_id' => $doctorId,
                            'intern_id' => $intern,
                            'is_day' => $day,
                            'therapist_id' => $therapistdoctor,
                            'venue_id' => $venu,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
                DB::commit();

                UserHelper::sendNotification($patientId, $msg, $titlenotification);
                $userTherapy = UserDailychart::with('department','patient','therapy.group','doctor','intern','venue')
                    ->where(['user_visit_id'=>$insertedId, 'is_default'=>0])
                    ->orderBy('id', 'desc')
                    ->get()->toArray();
                    
                return response()->json(['status'=>200, 'message' => 'Assigned the therapy to the patient with visite', 'page_type'=>'admin','view'=>(String)View::make('admin.userstherapy')
            ->with(compact('userTherapy'))], 200);

           }


        } catch(\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 500, 'message' => 'An error occurred.'], 500);
        }


        }

    }

    public function checkTimeSloat($patientId, $therapyDate, $starttime, $endtime)
    {

            return $timeSlot = UserDailychart::where('patient_id', $patientId)
                ->where('date', $therapyDate)
                ->where(function ($query) use ($starttime, $endtime) {
                    $query->where('start_time', '<', $endtime)
                          ->where('end_time', '>', $starttime);
                })
                ->count();
        
    }




    public function deletePatientTherapy(Request $request){

        if ($request->ajax()){

           $data = $request->all();
           $patientId = $data['patientId'];
           $therapyId = $data['therapyId'];

           $userViste = DB::table('user_visits')->where('patient_id', $patientId)->count();
            $titlenotification = "Therapy cancelled";
            $msg = "Your therepy deleted from chart";

            if($userViste >=1){
            $userVistes = DB::table('user_visits')->select('id','patient_id','doctor_id','date')->where('patient_id', $patientId)->first();
            $userVisteid = $userVistes->id;

            $deletedRows = DB::table('user_dailycharts')->where(['id'=>$therapyId, 'patient_id'=>$patientId])->delete();

            if ($deletedRows > 0) {

            UserHelper::sendNotification($patientId, $msg, $titlenotification);
            $userTherapy = UserDailychart::with('department','patient','therapy.group','doctor','intern','venue')
                        ->where(['user_visit_id'=>$userVisteid, 'is_default'=>0])
                        ->orderBy('id', 'desc')
                        ->get()->toArray();

            return response()->json(['status'=>200, 'message' => 'Deleted therapy', 'page_type'=>'admin','view'=>(String)View::make('admin.userstherapy')
                ->with(compact('userTherapy'))], 200);

            } else {

                $userTherapy = UserDailychart::with('department','patient','therapy.group','doctor','intern','venue')
                        ->where(['user_visit_id'=>$userVisteid, 'is_default'=>0])
                        ->orderBy('id', 'desc')
                        ->get()->toArray();
                        
                return response()->json(['status'=>200, 'message' => 'Therapy not deleted', 'page_type'=>'admin','view'=>(String)View::make('admin.userstherapy')
                ->with(compact('userTherapy'))], 200);
            }

            }

        }
    }


    public function deletemultipletTherapy(Request $request){

        if ($request->ajax()){
           $data = $request->all();
           $therapyIds = $data['therapy_id'];
           $patientId = $data['patientId'];

            $userViste = DB::table('user_visits')->where('patient_id', $patientId)->count();
            $titlenotification = "Therapy cancelled";
            $msg = "Your therepy deleted from chart";

            if($userViste >=1){
            $userVistes = DB::table('user_visits')->select('id','patient_id','doctor_id','date')->where('patient_id', $patientId)->first();
            $userVisteid = $userVistes->id;

            $deletedmuiltRows = DB::table('user_dailycharts')->whereIn('id', $therapyIds)->where('patient_id', $patientId)->delete();

            if ($deletedmuiltRows > 0) {

            UserHelper::sendNotification($patientId, $msg, $titlenotification);
                $userTherapy = UserDailychart::with('department','patient','therapy.group','doctor','intern','venue')
                        ->where(['user_visit_id'=>$userVisteid, 'is_default'=>0])
                        ->orderBy('id', 'desc')
                        ->get()->toArray();

            return response()->json(['status'=>200, 'message' => 'Deleted therapy', 'page_type'=>'admin','view'=>(String)View::make('admin.userstherapy')
                ->with(compact('userTherapy'))], 200);

            } else {
                $userTherapy = UserDailychart::with('department','patient','therapy.group','doctor','intern','venue')
                        ->where(['user_visit_id'=>$userVisteid, 'is_default'=>0])
                        ->orderBy('id', 'desc')
                        ->get()->toArray();
                        
                return response()->json(['status'=>200, 'message' => 'Therapy not deleted', 'page_type'=>'admin','view'=>(String)View::make('admin.userstherapy')
                ->with(compact('userTherapy'))], 200);
            }

            }

           
       }

    }





    public function patientDailyReport(Request $request, $id=null){

        $patient = User::find($id);
        $dailyReports = DB::table('user_daily_reports')->where('user_id',$id)->get();

            if($request->isMethod('post')) {

                $data = $request->all();
                $request->validate([
                    'weight' => 'required|numeric',
                    'bp_up' => 'required|numeric', 
                    //'bp_down' => 'required|numeric',
                    'respiratory_rate' => 'required|numeric',
                    'height' => 'required|numeric',
                    'pulse_rate' => 'required|numeric',
                    'date' => 'required',
                    'diastolic_pressure' => 'required',
                    'bhramari_time' => 'required',
                    'remarks' => 'required',
                    'bmi' => 'required',
                    'medications' => 'required',
                ]);

                $userVisit = DB::table('user_visits')->select('id', 'patient_id')
                    ->where('patient_id', $data['patientId'])
                    ->first();

                if (empty($userVisit)) {
                    return redirect()->back()->with('fail', 'User visit not created');
                }

                DB::table('user_daily_reports')->insert([
                    'user_id' => $data['patientId'],
                    'weight' => $data['weight'],
                    'height' => $data['height'],
                    'bp_up' => $data['bp_up'],
                    //'bp_down' => $data['bp_down'],
                    'bmi' => $data['bmi'],
                    'medications' => $data['medications'],
                    'pulse' => $data['pulse_rate'],
                    'respiratory_rate' => $data['respiratory_rate'],
                    'diastolic_pressure' => $data['diastolic_pressure'],
                    'bhramari_time' => $data['bhramari_time'],
                    'remarks' => $data['remarks'],
                    'date' => $data['date'],
                    'user_visit_id' => $userVisit->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                return redirect()->back()->with('success', 'Add daily report successfully');
            }

            return view('admin.dailyreport')->with(['patient' => $patient, 'dailyReports'=>$dailyReports, 'page_type' => 'admin']);
    }


    public function patientDailyreportUpdate(Request $request, $id=null){

        $report = UserDailyReport::find($id);
        if($request->isMethod('post')){
            $data = $request->all();
                $request->validate([
                    'weight' => 'required',
                    'bp_up' => 'required', 
                    //'bp_down' => 'required',
                    'respiratory_rate' => 'required',
                    'height' => 'required',
                    'pulse_rate' => 'required',
                    'date' => 'required',
                ]);

                DB::table('user_daily_reports')
                ->where('id', $id)
                ->update([
                    'user_id' => $data['patientId'],
                    'weight' => $data['weight'],
                    'height' => $data['height'],
                    'bp_up' => $data['bp_up'],
                    //'bp_down' => $data['bp_down'],
                    'bmi' => $data['bmi'],
                    'medications' => $data['medications'],
                    'pulse' => $data['pulse_rate'],
                    'respiratory_rate' => $data['respiratory_rate'],
                    'diastolic_pressure' => $data['diastolic_pressure'],
                    'bhramari_time' => $data['bhramari_time'],
                    'remarks' => $data['remarks'],
                    'date' => $data['date'],
                    'user_visit_id' => $data['visitId'],
                    'updated_at' => Carbon::now()
                ]);

                return redirect()->back()->with('success', 'Updated daily report successfully');
        }

        return view('admin.dailyreportupdate')->with(['report'=>$report, 'page_type'=>'admin']);

    }


    public function patientDailyreportDelete(Request $request, $id=null){

        $userdailyreport = userDailyReport::find($id);
        if($userdailyreport){
            $userdailyreport->delete();
            return redirect()->back()->with('success', "Deleted daily report");
        }
        
    }



    public function patientCaseDetails(Request $request, $id=null){

        $patient = User::find($id);

        $caseDetailsWithRelations = DB::table('case_details')
            ->join('users', 'case_details.user_id', '=', 'users.id')
            ->join('doctors', 'case_details.doctor_id', '=', 'doctors.id')
            ->where('case_details.user_id', '=', $id)
            ->select(
                'case_details.*',
                'users.id as user_id',
                'users.name as user_name',
                'users.email as user_email',
                'doctors.id as doctor_id',
                'doctors.firstname as doctor_name'
            )->get();

            /*echo "<pre>";
            print_r($caseDetailsWithRelations);
            die;*/


        if($request->isMethod('post')){
            $data = $request->all();
            $request->validate([
                'ip_no' => 'required|numeric',
                'chef_complain' => 'required',
                'medical_history' => 'required',
                'fined_diagnois' => 'required',
                'Illness_history' => 'required'
            ]);

             $userVisit = DB::table('user_visits')->select('id', 'patient_id','doctor_id','notes','date')->where('patient_id', $data['patientId'])->first();
            if (empty($userVisit)) {
                return redirect()->back()->with('fail', 'User visit not created');
            }

            DB::table('case_details')->insert([
                'user_id' => $data['patientId'],
                'user_visit_id' => $userVisit->id,
                'doctor_id' => $userVisit->doctor_id,
                'ipsection_id' => $data['ip_no'],
                'chief_complaints' => $data['chef_complain'],
                'medical_history' => $data['medical_history'],
                'final_diagnosis' => $data['fined_diagnois'],
                'history_present_illness' => $data['Illness_history'],
                'date' => date('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->back()->with('success', 'Add casedetails successfully');
        }

        return view('admin.casedetails')->with(['patient' => $patient, 'page_type' =>'admin', 'caseDetails'=>$caseDetailsWithRelations]);
    }


    public function patientCasedetailView(Request $request, $id=null){

        //$patient = User::find($id);
        $patient = CaseDetail::find($id);

        $caseDetailsWithRelations = DB::table('case_details')
            ->join('users', 'case_details.user_id', '=', 'users.id')
            ->join('doctors', 'case_details.doctor_id', '=', 'doctors.id')
            ->where('case_details.id', '=', $id)
            ->select(
                'case_details.*',
                'users.id as user_id',
                'users.name as user_name',
                'users.email as user_email',
                'doctors.id as doctor_id',
                'doctors.firstname as doctor_name'
            )
            ->get();

        return view('admin.casedetailsview')->with(['patient' => $patient, 'page_type' =>'admin', 'caseDetails'=>$caseDetailsWithRelations]);
    }


    public function patientCasedetailUpdate(Request $request, $id=null){

        $casedetail = CaseDetail::find($id);

        if($request->isMethod('post')){
            $data = $request->all();

            $request->validate([
                'ip_no' => 'required|numeric',
                'chef_complain' => 'required',
                'medical_history' => 'required',
                'fined_diagnois' => 'required'
            ]);

            DB::table('case_details')
                ->where('id', $id)
                ->update([
                'user_id' => $data['patientId'],
                'user_visit_id' => $data['visitId'],
                'doctor_id' => $data['doctorId'],
                'ipsection_id' => $data['ip_no'],
                'chief_complaints' => $data['chef_complain'],
                'medical_history' => $data['medical_history'],
                'final_diagnosis' => $data['fined_diagnois'],
                'date' => $data['date'],
                'updated_at' => now(),
            ]);
            return redirect()->route('patientCaseDetails', $data['patientId'])->with('success', 'Updated case details successfully');
        }

        return view('admin.casedetailupdate')->with(['casedetail'=>$casedetail, 'page_type'=>'admin']);
        
    }


    public function patientCasedetailDelete(Request $request, $id=null){
        $casedetail = CaseDetail::find($id);
        if($casedetail){
            $casedetail->delete();
            return redirect()->back()->with('success', "Deleted case detail");
        }
    }


    public function searchTherapy(Request $request){

        if(!Auth::check()){
            return redirect('/');
        }

        $therapy = Therapy::where('department_id', 1)->get();

        if($request->ajax()){

            $patient  = User::with('userDetails')->find($request->patientId);
            $userLangId = $patient->userDetails->language_id;

            $vanue  = UserHelper::userTherapyLanguageVenue(6, $userLangId);

            $therapy = Therapy::where('therapy_name','LIKE', '%'.$request->therapy.'%')->get();
            $output = '';
            if(count($therapy) >0){
                return response()->json(['status'=>200, 'venue'=>$vanue,'therapy'=>$therapy]);
            }else{
                return response()->json(['status'=>404, 'venue'=>[],'therapy'=>[], 'message' => 'No search data']);
            }
        }

        return response()->json(['status'=>200, 'message' => 'view doctors', 'page_type'=>'admin', 'therapys'=>$therapy], 200);

    }


    public function userDeparmentVanue(Request $request){

        if(!Auth::check()){
            return redirect('/');
        }

         if($request->ajax()){
            $departmentId = $request->departmentId;
             $patient  = User::with('userDetails')->find($request->patientId);
            $userLangId = $patient->userDetails->language_id;
            $vanue  = UserHelper::userTherapyLanguageVenue($departmentId, $userLangId);
            if($vanue){
                return response()->json(['status'=>200, 'venue'=>$vanue,'department'=>$departmentId]);
            }
         }
    }


    public function patientallTherapy(Request $request, $id){

        if(!Auth::check()){
            return redirect('/');
        }

        $user = User::find($id);
        $sectionId = $user->sectionMaping->section_id ?? '';
        $languageId = $user->userDetails->language_id ?? '';
        $uservisit_id = $user->uservisit->id ?? '';

        if(empty($uservisit_id)){
            return back()->with('message', 'Patient is not approve');
        }
        $filterData  = $request->only('search','therapy-date','table_size');
        $tablesize = $filterData['table_size'] ?? 10;
        
        $patientTherapy = UserDailychart::with('department','patient','therapy.group','doctor','intern','therapist','venue')
            ->where(['user_visit_id'=>$uservisit_id, 'patient_id'=>$id])
            ->searchBytherapyName($filterData)
            ->paginate($tablesize);
        return view('admin.patientalltherapy')->with(['patientTherapys'=>$patientTherapy, 'patient'=>$user, 'filterData'=>$filterData,'page_type'=>'admin']);

    }


}
