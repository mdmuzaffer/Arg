<?php

namespace App\Http\Controllers;

use Twilio\Rest\Client;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Models\PatientProfile;
use App\Models\Doctor;
use App\Models\Group;
use Carbon\Carbon;
use DB;
use App\Models\Slider;
use App\Models\AppIcone;
use App\Models\UserDailychart;
use App\Models\Language;
use App\Helpers\UserHelper;



class DoctorPatientController extends Controller
{

    public function doctorallPatients(Request $request){
        $patient = User::with('userDetails.department')->where('role',4)->get()->toArray();
       return view('admin.doctor.doctorallpatient')->with(['patients'=>$patient,'controller'=>'PatientController','page_type'=>'admin']);
    }



    public function doctorapprovePatients(Request $request){

        $patient = User::with('userDetails.department')->where('role',4)->where('is_active','1')->get()->toArray();

       /* echo $patient[0]['user_details']['department_status'];
        echo "<pre>";
        print_r($patient);
        die;*/


        return view('admin.doctor.doctorapprovepatient')->with(['patients'=>$patient,'controller'=>'PatientController','page_type'=>'admin']);
    }

    public function doctorDenypatients(Request $request){

        $patient = User::with('userDetails.department')->where('role',4)->where('is_active','0')->get()->toArray();
        return view('admin.doctor.doctordenypatient')->with(['patients'=>$patient,'controller'=>'PatientController','page_type'=>'admin']);
    }



     public function doctorProfileUpdate(Request $request, $id=null){
        $patient = User::find($id);
        $status = ($patient->is_active =='0') ? '1' : '0';
        $message =  $status =='0' ?"User profile now inactive" : "User profile now active";

        if ($patient->where('id', $id)->update(['is_active' => $status])) {
            return redirect()->back()->with('success', $message);
        } else {
            return redirect()->back()->with('success', 'Some things went to wrong');
        }
    }

    
    public function doctorProfileApprove(Request $request, $id=null){

        $patient = User::find($id);
        $status = ($patient->status =='0') ? '1' : '0';
        $message =  $status =='0' ?"User profile decline" : "User profile now approve";

        if ($patient->where('id', $id)->update(['status' => $status])) {
            return redirect()->back()->with('success', $message);
        } else {
            return redirect()->back()->with('success', 'Some things went to wrong');
        }
    }


    public function doctorInternProfile(Request $request, $id=null){
        $patient = User::with('userDetails.department','userDetails.section')->find($id);
        $departments = Department::all()->take(5);
        return view('admin.doctor.doctoruserprofile')->with(['user'=>$patient,'departments'=>$departments, 'controller'=>'PatientController','page_type'=>'admin']);
    }


    public function doctorDepartmentUpdate(Request $request , $id){
        $patient = User::with('userDetails.department')->find($id);

        $departments = Department::all()->take(5);
       if($request->isMethod('post')){
            $data = $request->all();
            $userId = $data['userId'];
            $department_type = $data['department_type'];

            $patientProfileCount = PatientProfile::where('user_id', $userId)->count();
            if($patientProfileCount >0){
                PatientProfile::where('user_id', $userId)->update(['department_id' => $department_type]);
                return redirect()->back()->with('success', 'Patient department updated');
            }else{
                return redirect()->back()->with('success', 'User profile is not updated');
            }
            
        }
    }


    public function patientDepartmentPending(Request $request){

        $patient = User::whereHas('userDetails', function($query) {
            $query->where('department_status', '0');
             //->orWhere('department_status', '2');
        })
        ->where('role', 4)
        ->where('is_active', '1')
        ->with('userDetails.department')
        ->get()
        ->toArray();

        /*echo "<pre>";
        print_r($patient);
        die;*/

       return view('admin.doctor.pendingpatient')->with(['patients'=>$patient,'controller'=>'PatientController','page_type'=>'admin']);
    }


    public function approveDepartment(Request $request){

       $patients = User::whereHas('userDetails', function($query) {
            $query->where('department_status', '1');
        })
        ->where('role', 4)
        ->where('is_active', '1')
        ->with('userDetails.department')
        ->get()
        ->toArray();


        /* foreach ($patients as $patient) {
            $departmentActiveDate = $patient['user_details']['department_active_date'];
            $activeDate = Carbon::parse($departmentActiveDate);
            $daysDifference = Carbon::now()->diffInDays($activeDate);
            if($daysDifference >= 6) {

                DB::table('users')->where('id', $patient['id'])->update(['is_active' =>'0']);
            }
         }*/

        return view('admin.doctor.departmentapprove')->with(['patients'=>$patients,'controller'=>'PatientController','page_type'=>'admin']);
    }


    public function declineDepartment(Request $request){

       $patient = User::whereHas('userDetails', function($query) {
            $query->where('department_status', '2');
        })
        ->where('role', 4)
        ->where('is_active', '1')
        ->with('userDetails.department')
        ->get()
        ->toArray();

        return view('admin.doctor.departmentdecline')->with(['patients'=>$patient,'controller'=>'PatientController','page_type'=>'admin']);
    }

    public function userSchedule(Request $request, $id){

        $patient = user::find($id);
        $doctor = Doctor::get();
        $departments = Department::get();
        $groups = Group::get();

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


        //return view('admin.doctor.userschedule')->with(['patient'=>$patient, 'doctors'=>$doctor, 'page_type'=>'admin']);


        return view('admin.doctor.userschedule')->with([
            'patient'=>$patient,
            'doctors'=>$doctor,
            'departments'=>$departments,
            'userTherapy'=>$userTherapy,
            'groups' =>$groups,
            'page_type'=>'admin'
        ]);


    }

}

