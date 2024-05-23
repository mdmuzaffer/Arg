<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Models\PatientProfile;
use App\Models\Doctor;
use App\Models\Group;
use DB;
use Carbon\Carbon;
use App\Models\Slider;
use App\Models\AppIcone;
use App\Models\UserDailychart;
use App\Models\Language;
use App\Helpers\UserHelper;


class InternPatientController extends Controller
{

    public function internallPatients(Request $request){
        $patient = User::with('userDetails.department')->where('role',4)->get()->toArray();
       return view('admin.intern.internallpatient')->with(['patients'=>$patient,'controller'=>'PatientController','page_type'=>'admin']);
    }


    public function internapprovePatients(Request $request){

        $patient = User::with('userDetails.department')->where('role',4)->where('is_active','1')->get()->toArray();
        return view('admin.intern.internapprovepatient')->with(['patients'=>$patient,'controller'=>'PatientController','page_type'=>'admin']);
    }

    public function internDenypatients(Request $request){

        $patient = User::with('userDetails.department')->where('role',4)->where('is_active','0')->get()->toArray();
        return view('admin.intern.interndenypatient')->with(['patients'=>$patient,'controller'=>'PatientController','page_type'=>'admin']);
    }

    public function patientProfileUpdate(Request $request, $id=null){
        $patient = User::find($id);
        $status = ($patient->is_active =='0') ? '1' : '0';
        $message =  $status =='0' ?"User profile now inactive" : "User profile now active";

        if ($patient->where('id', $id)->update(['is_active' => $status])) {
            return redirect()->back()->with('success', $message);
        } else {
            return redirect()->back()->with('success', 'Some things went to wrong');
        }
    }


    public function patientProfileApprove(Request $request, $id=null){

        $patient = User::find($id);
        $status = ($patient->status =='0') ? '1' : '0';
        $message =  $status =='0' ?"User profile decline" : "User profile now approve";

        if ($patient->where('id', $id)->update(['status' => $status])) {
            return redirect()->back()->with('success', $message);
        } else {
            return redirect()->back()->with('success', 'Some things went to wrong');
        }
    }



    public function patientProfile(Request $request, $id=null){
        $patient = User::with('userDetails.department','userDetails.section')->find($id);
        $departments = Department::all()->take(5);
        return view('admin.intern.internuserprofile')->with(['user'=>$patient,'departments'=>$departments, 'controller'=>'PatientController','page_type'=>'admin']);
    }


    public function patientDepartmentUpdate(Request $request , $id){

        $patient = User::with('userDetails.department')->find($id);
        $departments = Department::all()->take(5);
       if($request->isMethod('post')){
            $data = $request->all();
            $userId = $data['userId'];
            $department_type = $data['department_type'];
            PatientProfile::where('user_id', $userId)->update(['department_id' => $department_type]);
            return redirect()->back()->with('success', 'Patient department updated');
            
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

       return view('admin.intern.pendingpatient')->with(['patients'=>$patient,'controller'=>'PatientController','page_type'=>'admin']);
    }

    public function approveDepartment(Request $request){

       $patient = User::whereHas('userDetails', function($query) {
            $query->where('department_status', '1');
        })
        ->where('role', 4)
        ->where('is_active', '1')
        ->with('userDetails.department')
        ->get()
        ->toArray();

        return view('admin.intern.departmentapprove')->with(['patients'=>$patient,'controller'=>'PatientController','page_type'=>'admin']);
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

        return view('admin.intern.departmentdecline')->with(['patients'=>$patient,'controller'=>'PatientController','page_type'=>'admin']);
    }


    public function doctorDenypatients(Request $request){

        $patient = User::with('userDetails.department')->where('role',4)->where('is_active','0')->get()->toArray();
        return view('admin.intern.interndenypatient')->with(['patients'=>$patient,'controller'=>'PatientController','page_type'=>'admin']);
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


        return view('admin.intern.userschedule')->with([
            'patient'=>$patient,
            'doctors'=>$doctor,
            'departments'=>$departments,
            'userTherapy'=>$userTherapy,
            'groups' =>$groups,
            'page_type'=>'admin'
        ]);

        //return view('admin.intern.userschedule')->with(['patient'=>$patient, 'doctors'=>$doctor, 'page_type'=>'admin']);
    }


}
