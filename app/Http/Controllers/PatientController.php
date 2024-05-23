<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Models\PatientProfile;
use App\Models\Section;
use App\Models\UserSectionsMaping;
use Kyslik\ColumnSortable\Sortable;
use Auth;
use Carbon\Carbon;

class PatientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function userProfile(Request $request, $id=null){

        if(!Auth::check()){
            return redirect('/');
        }

        $patient = User::with('userDetails.department','sectionMaping.section','prescription')->find($id);
        $departments = Department::all()->take(5);
        $sections = Section::get();
        return view('admin.userprofile')->with(['user'=>$patient,'departments'=>$departments,'sections'=>$sections, 'page_type'=>'admin']);
    }

    public function Prescription(Request $request, $id){

        $patient = User::with('prescription')->find($id);
        return view('admin.userprescription')->with(['user'=>$patient]);

    }

    public function userProfileUpdate(Request $request, $id=null){

        $patient = User::find($id);
        $status = ($patient->is_active =='0') ? '1' : '0';
        $message =  $status =='0' ?"User profile now inactive" : "User profile now active";

        if ($patient->where('id', $id)->update(['is_active' => $status])) {
            return redirect()->back()->with('success', $message);
        } else {
            return redirect()->back()->with('success', 'Some things went to wrong');
        }
    }


    public function userProfileApprove(Request $request, $id=null){

        $patient = User::find($id);
        $status = ($patient->status =='0') ? '1' : '0';
        $message =  $status =='0' ?"User profile decline" : "User profile now approve";

        if ($patient->where('id', $id)->update(['status' => $status])) {
            return redirect()->back()->with('success', $message);
        } else {
            return redirect()->back()->with('success', 'Some things went to wrong');
        }
    }


    public function allPatients(Request $request){
        $patient = User::with('userDetails.department')->where('role',4)->get()->toArray();
       return view('admin.allpatient')->with(['patients'=>$patient,'controller'=>'PatientController','page_type'=>'admin']);

    }


    public function approvePatients(Request $request){

        $patient = User::with('userDetails.department')->where('role',4)->where('is_active','1')->get()->toArray();
        return view('admin.approvepatient')->with(['patients'=>$patient,'controller'=>'PatientController','page_type'=>'admin']);
    }


    public function Denypatients(Request $request){
        $patient = User::with('userDetails.department')->where('role',4)->where('is_active','0')->get()->toArray();
        return view('admin.denypatient')->with(['patients'=>$patient,'controller'=>'PatientController','page_type'=>'admin']);
    }

    public function approveDepartment(Request $request){

       // $patient = User::with('userDetails.department')->where('role',4)->where('is_active','1')->get()->toArray();

       $patient = User::whereHas('userDetails', function($query) {
            $query->where('section_status', '1');
        })
        ->where('role', 4)
        ->where('is_active', '1')
        ->with('userDetails.department')
        ->get()
        ->toArray();

        return view('admin.departmentapprove')->with(['patients'=>$patient,'controller'=>'PatientController','page_type'=>'admin']);
    }


    public function declineDepartment(Request $request){

       $patient = User::whereHas('userDetails', function($query) {
            $query->where('section_status', '2');
        })
        ->where('role', 4)
        ->where('is_active', '1')
        ->with('userDetails.department')
        ->get()
        ->toArray();

        return view('admin.departmentdecline')->with(['patients'=>$patient,'controller'=>'PatientController','page_type'=>'admin']);
    }

    public function inactivePatients(Request $request){
        $patient = User::with('userDetails.department')->where('role',4)->where('is_active','0')->get()->toArray();
        return view('admin.inactive')->with(['patients'=>$patient,'controller'=>'PatientController','page_type'=>'admin']);
    }


    public function userSectionUpdate(Request $request , $id){

       if($request->isMethod('post')){
            $data = $request->all();
            $userId = $data['userId'];
            $section_type = $data['section_type'];

            $user = User::find($userId);
            $sectionId = $user->sections[0]['id'];

            $userSectionMapping  = UserSectionsMaping::where(['user_id' => $userId, 'is_active'=>'1','status'=>'1'])
            ->orderBy('id', 'desc')->first();

            if($userSectionMapping){
                $updated = $userSectionMapping->update(['is_active'=>'0', 'status'=>'0']);

                if($updated){
                    $sectionmaping = new UserSectionsMaping;
                    $sectionmaping->section_id = $section_type;
                    $sectionmaping->user_id = $userId;
                    $sectionmaping->approved_by = 1;
                    $sectionmaping->is_active = '1';
                    $sectionmaping->status = '1';
                    $sectionmaping->declined_reason = 'Section change';
                    $sectionmaping->section_active_date = Carbon::now();
                    $sectionmaping->save();
                }
            }

            return redirect()->back()->with('success', 'User section updated');
            
        }
    }


    public function patientDetailsWithfilter(Request $request){

        if(!Auth::check()){
            return redirect('/');
        }

        $sections = Section::all();
        $filterData  = $request->only('section-status','patient-status','section','search');

        //Auth::user()->sections->pluck('id');
        //Auth::user()->sections->section_id;

        $role = auth()->user()->role;
        $sectionId = "";
        if($role!=1){
            $sectionId = Auth::user()->sections->pluck('id');
        }

        $patient = User::whereHas('sections', function($query) use ($sectionId){
            $query->where('is_active', '1');
            if($sectionId) {
                $query->whereIn('section_id', $sectionId);
            }
        })
        ->where('role', 4)
        //->where('status', '0')
        ->search($filterData)
        ->with('userDetails')
        ->with('sections')
        ->with('sectionMaping.section')
        ->sortable()
        ->orderBy('id', 'desc')
        ->paginate(10);

        /*echo "<pre>";
        print_r($patient->toArray());
        die;*/

       return view('admin.pendingpatient')->with(['patients'=>$patient, 'filterdata'=>$filterData,'sections'=>$sections,'page_type'=>'admin']);

    }


    public function patienttatusChange(Request $request){


        if(!Auth::check() ){
            return redirect('/');
        }

        if(Auth::user()->role ==3){
            return response()->json(['status'=>403, 'message'=>'Doctor and admin status can change']);
        }

        if ($request->ajax()){
            $data = $request->all();
            $id =  $data['selectedUserId'];
            $status =  $data['selectedOption'];
            $patient = User::find($id);

            if($status ==0 && $patient->status >0){
                return response()->json(['status'=>403, 'message'=>'Already changed patient status']);
            }

            if($patient->where('id', $id)->update(['status' => $status])) {
                return response()->json(['status'=>200, 'message'=>'patient status change']);
            } else {
                return response()->json(['status'=>500, 'message'=>'Some things went to wrong']);
            }
        }
    }


}
