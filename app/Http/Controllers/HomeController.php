<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\Department;
use App\Models\Section;
use App\Models\Intern;
use App\Models\Doctor;
use App\Models\Therapy;
use App\Models\Slider;
use App\Models\Accommodation;
use App\Helpers\UserHelper;
use App\Models\PatientProfile;
use App\Models\AppIcone;
use App\Models\Language;
use App\Models\UserSectionsMaping;
use App\Models\Therapist;
use App\Models\UserVisit;
use App\Models\UserDailychart;
use App\Models\WeekDay;
use App\Models\WeeklySchedule;
use App\Models\UserLog;
use App\Models\PaymentDetail;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        //$users = User::with(['roles','permissions'])->get()->toArray();


        $startDate = $request->only('start_date');
        $endDate = $request->only('end_date');

        $getTotalUsers = User::where('role', 4)->filterByDateRange($startDate, $endDate)->count();
        $dischargePatient =  User::where(['role'=>4, 'is_active'=>'0'])->filterByDateRange($startDate, $endDate)->count();
        $newPatient = User::where(['role'=>4, 'is_active'=>'1'])->filterByDateRange($startDate, $endDate)->count();
        $getTotalDoctor =  User::where('role',2)->filterByDateRange($startDate, $endDate)->count();
        $getTotalIntern  =  User::where('role',3)->filterByDateRange($startDate, $endDate)->count();


        $user = Auth::user();

        $sectionCounts = DB::table('user_sections_mapings')
            ->join('users', 'user_sections_mapings.user_id', '=', 'users.id')
            ->select('user_sections_mapings.section_id', DB::raw('count(*) as count'))
            ->where('users.role', 2)
            ->groupBy('user_sections_mapings.section_id')
            ->get()->toArray();

        $countDoctorSectionwise = [];
        foreach ($sectionCounts as $item) {
            $countDoctorSectionwise[] = $item->count;
        }
        $countValuesString = implode(',', $countDoctorSectionwise);


        //Monthely wise patient count
        $currentYear = date('Y');
        $monthlyPatientCounts = [];
        for($month = 1; $month <= 12; $month++) {
            $firstDayOfMonth = Carbon::createFromDate($currentYear, $month, 1)->startOfDay();
            $lastDayOfMonth = Carbon::createFromDate($currentYear, $month, 1)->endOfMonth()->endOfDay();

            //$patientCount = PatientProfile::whereBetween('section_active_date', [$firstDayOfMonth, $lastDayOfMonth])->count();
            $patientCount = UserSectionsMaping::whereBetween('section_active_date', [$firstDayOfMonth, $lastDayOfMonth])->count();

            $monthlyPatientCounts[] = $patientCount;
        }
        $monthlyPatient = implode(',', $monthlyPatientCounts);


       return view('admin.dashboard')->with(['admin'=>$user, 'sectiondoctors'=>$countValuesString, 'monthlyPatient'=>$monthlyPatient, 'controller'=>'HomeController','page_type'=>'admin', 'route_type'=>'dashboard', 'getTotalUsers'=>$getTotalUsers,'dischargePatient'=>$dischargePatient, 'newPatient'=>$newPatient, 'getTotalDoctor'=>$getTotalDoctor,'getTotalIntern'=>$getTotalIntern]);
    }

    public function profileAdmin(Request $request){
        $user = Auth::user();
        return view('admin.profile')->with(['admin'=>$user,'controller'=>'HomeController','page_type'=>'admin']);
    }

    public function adminPasswordChange(Request $request){
        
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
            'new_password_confirmation' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['status_code' => 0,'error' => $validator->errors()->toArray()]);
        }

        if (!Hash::check($request->current_password, $user->password)){
            return response()->json([
                'status_code' =>0,
                'error' =>["current_password"=>"The current password is incorrect"],
            ],200);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);
        return response()->json([
            'status_code' => 200,
            'message' => 'Successfully updated your new password',
        ],200);
        
    }

    public function adminProfileUpdate(Request $request){

        if ($request->ajax()){

            $data = $request->all();
            $name = $data['name'];
            $email = $data['email'];
            $mobile = $data['mobile'];
            $mobilno = "+91".$mobile;
            $adminId = $data['adminId'];
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'mobile' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['status_code' => 0,'error' => $validator->errors()->toArray()]);
            }else{
                DB::table('users')->where('id',$adminId)->update(['name'=>$name,'email'=>$email,'mobile_no'=>$mobilno]);
                return response()->json(['status_code' => 200,'message' => 'Successfully updated your profile',],200);
        
            }

        }

    }

    public function doctors(Request $request){
        

        $sections = Section::all();
        $filterData  = $request->only('section-status','patient-status','section','search','table_size');

        $tablesize = $filterData['table_size'] ?? 10;

        $doctor = User::whereHas('sections', function($query){
            $query->where('is_active', '1');
        })
        ->where('role', 2)
        //->where('is_active', '1')
        ->orderBy('id','DESC')
        ->search($filterData)
        ->with('userDetails')
        ->with('sections')
        ->sortable()
        ->paginate($tablesize);

        /*echo "<pre>";
        print_r($doctor);
        die;*/

        return view('admin.doctor')->with(['doctors'=>$doctor,'sections'=>$sections, 'filterdata'=>$filterData, 'page_type'=>'admin']);
    }

    public function doctorView(Request $request, $id=null){
        $user = User::find($id);
        $departments = Department::all()->take(5);
        $doctor = User::with('doctor','sections')->find($id);
        return view('admin.doctorview')->with(['doctor'=>$doctor, 'departments'=>$departments, 'controller'=>'HomeController','page_type'=>'admin']);
    }

    public function doctorDelete(Request $request, $id=null){

        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'Doctor not found.');
        }
        if($user->doctor) {
           $user->doctor->delete();
        }
        $user->delete();
        return redirect()->back()->with('success', 'Doctor and related data deleted successfully');


    }


    public function interns(Request $request){

        $sections = Section::all();
        $filterData  = $request->only('section-status','patient-status','section','search','table_size');
        $tablesize = $filterData['table_size'] ?? 10;

        $intern = User::whereHas('sections', function($query){
            $query->where('is_active', '1');
        })
        ->where('role', 3)
        ->search($filterData)
        ->with('userDetails')
        ->with('sections')
        ->sortable()
        ->orderBy('name', 'asc')
        ->paginate($tablesize);

        /*echo "<pre>";
        print_r($intern);
        die;*/

        return view('admin.intern')->with(['interns'=>$intern,'sections'=>$sections, 'filterdata'=>$filterData, 'page_type'=>'admin']);
    }

    public function internView(Request $request, $id=null){

        $user = User::find($id);
        $departments = Department::all()->take(5);
        $intern = User::with('intern','sections')->find($id);
        return view('admin.internview')->with(['intern'=>$intern, 'departments'=>$departments, 'page_type'=>'admin']);
    }


    public function internDelete(Request $request, $id=null){

        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'Intern not found.');
        }
        if($user->intern) {
           $user->intern->delete();
        }
        $user->delete();
        return redirect()->back()->with('success', 'Intern and related data deleted successfully');

    }


    public function patients(){
        $patient = User::where('role',4)->get();
        $patientData = User::with('userDetails.department')->where('role',4)->orderBy('id', 'desc')->get()->toArray();
        return view('admin.patient')->with(['patients'=>$patientData,'controller'=>'HomeController','page_type'=>'admin']);
    }


    public function Department(Request $request){
        $department = Department::get();
        return view('admin.department')->with(['departments'=>$department, 'page_type'=>'admin']);
    }


    public function addDepartment(Request $request, $id=null){

        $department = Department::find($id);

        if($request->isMethod('post')) {
            $data = $request->all();
            $request->validate([
                'name' => 'required',
                //'image' => 'required|image',
            ]);

            if($id){
                $department = Department::find($id);
                $message = "Updated department Successfully";
            }else{
                $department = new Department;
                $message = "Add department Successfully";
            }

            if($request->hasFile('image')) {
                $file = $request->file('image');
                $destinationPath = "images/icone";
                $imagePath = UserHelper::uploadImage($file, $destinationPath);
                $department->icon = $imagePath;
            }

            $department->name = $data['name'];
            $department->description = $data['description'];
            $department->status ="1";
            $department->save();     
            return redirect()->back()->with('success', $message);
        }

        return view('admin.adddepartmentform')->with(['department'=>$department]);
    }


    public function deleteDepartment(Request $request, $id=null){

        $department = Department::find($id);
        if(file_exists($department->icon)){
            unlink($department->icon);
            Department::where('id', $id)->delete();
            return redirect()->back()->with('success', 'Successfully deleted record');
        } else {
            Department::where('id', $id)->delete();
            return redirect()->back()->with('success', 'Deleted department Successfully');
        }

    }



    public function Sections(Request $request){
        $section = Section::get();
        return view('admin.section')->with(['sections'=>$section, 'page_type'=>'admin']);
    }


    public function addSection(Request $request, $id=null){
        $section = Section::find($id);

        if($request->isMethod('post')) {
            $data = $request->all();
            $request->validate([
                'name' => 'required|string|between:5,30',
                //'image' => 'required|image',
            ]);

            if($id){
                $section = Section::find($id);
                $message = "Updated section Successfully";
            }else{
                $section = new Section;
                $message = "Add section Successfully";
            }

            if($request->hasFile('image')) {
                $file = $request->file('image');
                $destinationPath = "images/icone";
                $imagePath = UserHelper::uploadImage($file, $destinationPath);
                $section->icon = $imagePath;
            }

            $status = '0';
            if (isset($data['status']) && $data['status'] == 'on') {
                $status = '1';
            }

            $section->name = $data['name'];
            $section->description = $data['description'];
            $section->status = $status;
            $section->save();     
            return redirect()->back()->with('success', $message);
        }

        return view('admin.adddsectionform')->with(['section'=>$section]);
    }

    public function deleteSection(Request $request, $id=null){
        
        $section = Section::find($id);

        if(file_exists($section->icon)){
            unlink($section->icon);
            Section::where('id', $id)->delete();
            return redirect()->back()->with('success', 'Successfully deleted record');
        } else {
            Section::where('id', $id)->delete();
            return redirect()->back()->with('success', 'Deleted section Successfully');
        }
    }



    public function Therapy(Request $request){

        $filterData  = $request->only('department','search','table_size');
        $tablesize = $filterData['table_size'] ?? 10;

        $departments = Department::all();
        $therapy = Therapy::with('therapyDepartment')
        ->search($filterData)
        ->orderBy('therapy_name', 'asc')
        ->sortable()
        ->paginate($tablesize);
        return view('admin.therapy')->with(['therapies'=>$therapy, 'filterdata'=>$filterData, 'departments'=>$departments, 'page_type'=>'admin']);
    }
    

    public function patientsectionStatus(Request $request){

         if ($request->ajax()){
            if(Auth::user()->role ==3){
                return response()->json(['status_code'=>403, 'message'=>'Doctor and admin section status can change']);
            }

            $data = $request->all();
            $userId =  $data['selectedUserId'];
            $sectionStatus =  $data['sectionStatus'];
            $doctorId =  $data['doctorId'];

            //Here some time admin can approve profile the doctor id is default adding
            //$doctorId = $doctorId =='1' ? '2' : $doctorId;

            $user = User::find($userId);

            $date = null;
            $msg = "";
            if($sectionStatus==1){
                $date = date('Y-m-d H:i:s');
                $msg = "Your section approved";
            }else if($sectionStatus ==2){
                $msg = "Your section decline";
            }else{
                $msg = "Your section is pending";
            }


            $usersection = UserSectionsMaping::where('user_id', $userId)
                        ->where('is_active','=','1')
                        ->latest()
                        //->where('status','!=','1')
                        ->first();

            if($usersection){
                DB::table('user_sections_mapings')->where('user_id',$userId)->where('is_active','=','1')
                ->update([
                    'status'=>$sectionStatus,
                    'section_active_date'=>$date
                ]);

                //if section approve then create visite  
                if($sectionStatus ==1){
                    $userVisite =  UserVisit::where('patient_id', $userId)->where('status','1')->first();
                    if(empty($userVisite)){
                        $visite  = new UserVisit;
                        $visite->patient_id = $userId;
                        $visite->doctor_id = $doctorId;
                        $visite->date = Carbon::now();
                        $visite->notes = 'New patient';
                        $visite->status = '1';
                        $visite->save();

                        $user = User::find($userId);
                        $user->status = '1';
                        $user->save();
                    }
                }


                $sectionId = $user->sectionMaping->section_id;
                $languageId = $user->userDetails->language_id;

                $datetherapy = date('Y-m-d');
                $datename = Carbon::createFromFormat('Y-m-d', $datetherapy);
                $dayName = $datename->format('l');
                $weekDay = WeekDay::where('id', 1)->first();

                if($weekDay->day =="Tuesday"){
                $weeklyTherapy = $weekDay->weeklySchedules->toArray();
                $therapyIds = array_column($weeklyTherapy, 'therapy_id');

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

                $userVisite = DB::table('user_visits')->where(['patient_id'=>$userId, 'status'=>'1'])
                ->select('id','patient_id','doctor_id','date','notes','status')->first();


                if(!empty($userVisite)){
                    $visitId = $userVisite->id;
                    $visitDate = $userVisite->date;
                    
                   $addvisitDate = Carbon::createFromFormat('Y-m-d', $visitDate);

                    $userTherapydefaulCount = UserDailychart::with('department','patient','therapy.group','doctor','intern','venue')
                    ->where(['user_visit_id'=>$visitId, 'date'=>$visitDate,'is_default'=>1])->count();

                    if($userTherapydefaulCount <1){

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
                            
                        }
                    }

                }

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



                        $unsetSpecialTechnique = array_filter($defaultdata, function($value) {
                            return $value->therapy_name !== "Special Technique";
                        });
                       $defaultdata = array_values($unsetSpecialTechnique);



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

                    $userVisite = DB::table('user_visits')->where(['patient_id'=>$userId, 'status'=>'1'])
                    ->select('id','patient_id','doctor_id','date','notes','status')->first();


                    if(!empty($userVisite)){
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


               $response =  UserHelper::sendNotificationTouser($userId, $msg, $sectionStatus);
                return response()->json(['status_code' =>200,'message' =>$msg],200);

            }else{
                return response()->json(['status_code' =>0,'message' => 'Patient profile not updated',],200);
            }
            
         }

    }


    public function therapyasDepartment(Request $request){

        $departmentId = $request->input('selectedDepartment');
        
        $selectedDepartment = DB::table('therapies')
            ->select('id','therapy_name','department_id')
            ->where('department_id', $departmentId)
            ->get();

        $selectedVenu = DB::table('venues')
            ->select('id','name')
            ->where('department_id', $departmentId)
            ->get();

         $selectedDoctor = DB::table('doctors')
            ->select('id','user_id','firstname')
            ->get();

        $selectedIntern = DB::table('interns')
            ->select('id','user_id','firstname')
            ->get();

        $selectedTherapy = DB::table('therapists')
            ->select('id','firstname')
            ->get();

        return response()->json([
            'selectedDepartment'=>$selectedDepartment,
            'venue'=>$selectedVenu,
            'doctor'=>$selectedDoctor,
            'intern'=>$selectedIntern,
            'therapist' =>$selectedTherapy
        ]);

    }



    public function therapyasDepartmentwithGroup(Request $request){

        $departmentId = $request->input('selectedDepartment');
        $dietgroupId = $request->input('dietgroup');

        $selectedDepartment = DB::table('therapies')
            ->select('id','therapy_name','department_id')
            ->where('department_id', $departmentId)
            ->where('group_id', $dietgroupId)
            ->get();

        $selectedVenu = DB::table('venues')
            ->select('id','name')
            ->where('department_id', $departmentId)
            ->get();

         $selectedDoctor = DB::table('doctors')
            ->select('id','user_id','firstname')
            ->get();

        $selectedIntern = DB::table('interns')
            ->select('id','user_id','firstname')
            ->get();

        $selectedTherapy = DB::table('therapists')
            ->select('id','firstname')
            ->get();

        return response()->json([
            'selectedDepartment'=>$selectedDepartment,
            'venue'=>$selectedVenu,
            'doctor'=>$selectedDoctor,
            'intern'=>$selectedIntern,
            'therapist' =>$selectedTherapy
        ]);

    }


    public function HomeSlider(Request $request){
        $sliders = DB::table('sliders')->select('id','title','description','images', 'slider_type', 'language_code', 'status','created_at')->orderBy('slider_type', 'asc')->get();
        return view('admin.slider')->with(['sliders'=>$sliders , 'controller'=>'HomeController','page_type'=>'admin']);
    }


    public function sliderUpdate(Request $request, $id=null){

        $slider = DB::table('sliders')->where('id', $id)->first();
        $language = Language::select('name','shortname')->get();

        if($request->isMethod('post')) {

            $request->validate([
                'title' => 'required|string|between:5,200',
                'description' => 'required|string|between:5,200',
            ]);

            $data = $request->all();

            $slider = Slider::find($id);

            if($request->hasFile('image')) {
                $file = $request->file('image');
                $destinationPath = "admin/assets/img/slider";
                $imagePath = UserHelper::uploadImage($file, $destinationPath);
                $slider->images = $imagePath;
            }

            $status = 0;
            if (isset($data['status']) && $data['status'] == 'on') {
                $status = 1;
            }

            $slider->slider_type = $data['slider_type'];
            $slider->title = $data['title'];
            $slider->description = $data['description'];
            $slider->language_code = $data['slider_language'];
            $slider->status = $status;
            $slider->save();     
            return redirect()->back()->with('success', 'Updated slider Successfully');

        }
        return view('admin.sliderform')->with(['slider'=>$slider,'language'=>$language]);

    }


    public function addSlider(Request $request){


        $language = Language::select('name','shortname')->get();

        if($request->isMethod('post')) {

            $data = $request->all();

            $request->validate([
                'title' => 'required|string|between:5,200',
                'description' => 'required|string|between:5,200',
                'image' => 'required|image',
                'slider_language' => 'required',
            ]);

            $slider = new Slider;
            if($request->hasFile('image')) {
                $file = $request->file('image');
                $destinationPath = "admin/assets/img/slider";
                $imagePath = UserHelper::uploadImage($file, $destinationPath);
                $slider->images = $imagePath;
            }

            $status = 0;
            if (isset($data['status']) && $data['status'] == 'on') {
                $status = 1;
            }

            $slider->slider_type = $data['slider_type'];
            $slider->title = $data['title'];
            $slider->description = $data['description'];
            $slider->language_code = $data['slider_language'];
            $slider->status = $status;
            $slider->save();     
            return redirect()->back()->with('success', 'Add slider Successfully');

        }

         return view('admin.addsliderform', compact('language'));
    }


    public function sliderDelete(Request $request, $id){

        $slider = Slider::find($id);
        $filename = basename($slider->images);
        if (file_exists($slider->images)) {
            unlink($slider->images);
            Slider::where('id', $id)->delete();
            return redirect()->back()->with('success', 'Successfully deleted record');
        } else {
            Slider::where('id', $id)->delete();
            return redirect()->back()->with('success', 'deleted slider Successfully');
        }
    }


    public function viewSlider(Request $request, $id){
        $slider = Slider::find($id);
        return view('admin.sliderview', compact('slider'));
    }


    public function addTherapy(Request $request, $id =null){

        $department = Department::get();
        $therapy = Therapy::select('id','therapy_name','department_id','start_time','end_time','status')->where('id',$id)->first();
        
        if($request->isMethod('post')){
            $data = $request->all();
            $request->validate([
                'therapy_name' => 'required|string|between:3,300',
                'department' => 'required',
            ]);

            if($id){

                $therapy = Therapy::find($id);
                $message = "Updated your therapy";

            }else{

                $therapy = new Therapy;
                $message = "Added new therapy";
            }

            $status = '0';
            if (isset($data['status']) && $data['status'] == 'on') {
                $status = '1';
            }


            $therapy->therapy_name = $data['therapy_name'];
            $therapy->department_id = $data['department'];
            $therapy->start_time = $data['start_time'];
            $therapy->end_time = $data['end_time'];
            $therapy->status = $status;
            $therapy->save();
            return redirect()->back()->with('success', $message);

        }

        return view('admin.addtherapyform')->with(['departments'=>$department, 'therapy'=>$therapy]);

    }


    public function deleteTherapy(Request $request, $id){
        $therapy = Therapy::find($id);
        if ($therapy) {
            $therapy->delete();
            return redirect()->back()->with('success', "Deleted therapy");
        }

    }


    public function accommodation(Request $request){
        $accommodation = Accommodation::OrderBy('id','desc')->get();
        return view('admin.accommodation')->with(['accommodations'=>$accommodation ,'page_type'=>'admin']);
    }


    public function addAccommodation(Request $request, $id=null){

        $accommodations = Accommodation::select('id','name','description','status')->where('id',$id)->first();

        if($request->isMethod('post')){
            $data = $request->all();

            $request->validate([
                'name' => 'required|string|between:3,200',
                'description' => 'required|string|between:3,200',
            ]);

            if($id){

                $accommodation = Accommodation::find($id);
                $message = "Updated your accommodation";

            }else{

                $accommodation = new Accommodation;
                $message = "Added new accommodation";
            }

            $status = '0';
            if (isset($data['status']) && $data['status'] == 'on') {
                $status = '1';
            }

            $accommodation->name = $data['name'];
            $accommodation->description = $data['description'];
            $accommodation->status = $status;
            $accommodation->save();

            return redirect()->back()->with('success', $message);

        }

        return view('admin.addaccommodationform')->with(['accommodations'=>$accommodations]);
    }

    public function deleteAccommodation(Request $request, $id){

        $accommodation = Accommodation::find($id);
        if ($accommodation) {
            $accommodation->delete();
            return redirect()->back()->with('success', "Deleted accommodation");
        }
    }


    public function appconeList(Request $request){
        $appicone = appIcone::get();
        return view('admin.appicone')->with(['appicones'=>$appicone, 'page_type'=>'admin']);
    }

    public function addAppicone(Request $request, $id=null){

        if($request->isMethod('post')){
            $data = $request->all();

             // Validation rules for creating a new app icon
            $createRules = [
                'app_type' => 'required',
                'app_title' => 'required',
                'app_description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ];

            // Validation rules for updating an existing app icon
            $updateRules = [
                'app_type' => 'required',
                'app_title' => 'required',
                'app_description' => 'required',
            ];


            if($id){
                $request->validate($updateRules);
                $appicone = appIcone::find($id);
                $message = "Updated your app icon";
            }else{
                $request->validate($createRules);
                $appicone = new appIcone;
                $message = "Added new app icon";
            }

            if($request->hasFile('image')) {
                $file = $request->file('image');
                $destinationPath = "/images/icone";
                $imagePath = UserHelper::uploadImage($file, $destinationPath);
                $appicone->app_icone = $imagePath;
            }


            $status = 0;
            if (isset($data['status']) && $data['status'] == 'on') {
                $status = 1;
            }


            $appicone->app_type = $data['app_type'];
            $appicone->app_title = $data['app_title'];
            $appicone->app_description = $data['app_description'];
            $appicone->status  = $status;
            $appicone->save();
            return redirect()->back()->with('success', $message);

        }

          $appicone = appIcone::select('id','app_type','app_title','app_description','status')->where('id',$id)->first();
          return view('admin.appiconeform')->with(['appicones'=>$appicone]);
    }


    public function deleteAppicone(Request $request, $id){

        $appIcone = appIcone::find($id);
        if ($appIcone) {
            $appIcone->delete();
            return redirect()->back()->with('success', "Deleted app icon");
        }
    }


    public function appLanguages(Request $request){

        $applanguages = Language::get();
        return view('admin.applanguages')->with(['applanguages'=>$applanguages,'page_type'=>'admin']);

    }

    public function addLanguage(Request $request, $id=null){


            if($request->isMethod('post')){
            $data = $request->all();

            $request->validate([
                'name' => 'required|string|between:3,20',
                'shortname' => 'required|string|between:2,5',
            ]);


            if($id){
                $language = Language::find($id);
                $message = "Updated your language";
            }else{
                $language = new Language;
                $message = "Added new language";
            }

            $status = '0';
            if (isset($data['status']) && $data['status'] == 'on') {
                $status = '1';
            }

            $language->name = $data['name'];
            $language->shortname = $data['shortname'];
            $language->status = $status;
            $language->save();
            return redirect()->back()->with('success', $message);

        }
        
        $applanguages = Language::select('id','name','shortname','language_flag','status')->where('id',$id)->first();
        return view('admin.applanguageform')->with(['applanguages'=>$applanguages]);

    }


    public function deleteLanguage(Request $request, $id){

        $language = Language::find($id);
        if ($language) {
            $language->delete();
            return redirect()->back()->with('success', "Deleted language");
        }
    }



    public function privacy()
    {
        echo "privacy";
    }

    public function policy()
    {
        echo "policy";
    }

    public function doctoradd(Request $request){

        $sections = Section::get();
        if($request->isMethod('post')){

            $data = $request->all();
            $request->validate([
                'name' => 'required|string|between:3,100',
                'lastname' => 'required|string|between:3,100', 
                'email' => 'required|email|unique:users,email',
                'mobile' => ['required', 'regex:/^\d{10,12}$/'],
                'doctor_section' => 'required',
            ]);


            $mobileNumber = '+91' . $data['mobile'];
            $userExists = User::where('mobile_no', $mobileNumber)->exists();
            if ($userExists > 0) {
                return redirect()->back()->withInput()->withErrors(['mobile' => 'The mobile number has already been taken.']);
            }


            $user = new User;
            $doctor = new Doctor;
            $message = "Added new doctor";

            if($request->hasFile('image')) {
                $file = $request->file('image');
                $destinationPath = "images/profile";
                $imagePath = UserHelper::uploadImage($file, $destinationPath);
                $doctor->profile_photo = $imagePath;
            }

            $status = '0';
            if (isset($data['status']) && $data['status'] == 'on') {
                $status = '1';
            }

            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->mobile_no = "+91".$data['mobile'];
            $user->password = bcrypt('arogyadhama@123');
            $user->role = 2;
            $user->status = $status;
            $user->save();

            $lastInsertedId = $user->id;
            $doctor->firstname = $data['name'];
            $doctor->lastname = $data['lastname'];
            $doctor->email = $data['email'];
            $doctor->mobile_no = "+91".$data['mobile'];
            $doctor->user_id = $lastInsertedId;
            $doctor->status = $status;
            $doctor->save();


            foreach ($data['doctor_section'] as $sectionId) {
                $sectionmaping = new UserSectionsMaping;
                $sectionmaping->user_id = $user->id;
                $sectionmaping->section_id = $sectionId;
                $sectionmaping->approved_by = 1;
                $sectionmaping->is_active = '1';
                $sectionmaping->status = '1';
                $sectionmaping->section_active_date = now();
                $sectionmaping->save();
            }

            return redirect()->back()->with('success', $message);

        }

        return view('admin.doctoradd', compact('sections'));
    }

    public function internAdd(Request $request){
        $sections = Section::get();
        if($request->isMethod('post')){

            $data = $request->all();
            $request->validate([
                'name' => 'required|string|between:3,100',
                'lastname' => 'required|string|between:3,100',
                'email' => 'required|email|unique:users,email',
                'mobile' => ['required', 'regex:/^\d{10,12}$/'],
                'intern_section' => 'required',
            ]);


            $user = new User;
            $intern = new Intern;
            $message = "Added new intern";

            $mobileNumber = '+91' . $data['mobile'];
            $userExists = User::where('mobile_no', $mobileNumber)->exists();
            if ($userExists > 0) {
                return redirect()->back()->withInput()->withErrors(['mobile' => 'The mobile number has already been taken.']);
            }
            

            if($request->hasFile('image')) {
                $file = $request->file('image');
                $destinationPath = "images/profile";
                $imagePath = UserHelper::uploadImage($file, $destinationPath);
                $intern->profile_photo = $imagePath;
            }

            $status = '0';
            if (isset($data['status']) && $data['status'] == 'on') {
                $status = '1';
            }

            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->mobile_no = "+91".$data['mobile'];
            $user->password = bcrypt('arogyadhama@123');
            $user->role = 3;
            $user->status = $status;
            $user->save();

            $lastInsertedId = $user->id;
            $intern->firstname = $data['name'];
            $intern->lastname = $data['lastname'];
            $intern->email = $data['email'];
            $intern->mobile_no = "+91".$data['mobile'];
            $intern->user_id = $lastInsertedId;
            $intern->status = $status;
            $intern->save();


            foreach ($data['intern_section'] as $sectionId) {
                $sectionmaping = new UserSectionsMaping;
                $sectionmaping->user_id = $user->id;
                $sectionmaping->section_id = $sectionId;
                $sectionmaping->approved_by = 1;
                $sectionmaping->is_active = '1';
                $sectionmaping->status = '1';
                $sectionmaping->section_active_date = now();
                $sectionmaping->save();
            }

            return redirect()->back()->with('success', $message);

        }

        return view('admin.internadd', compact('sections'));
    }


    public function internUpdate(Request $request, $id){

        $intern = User::with('intern','sections','sectionMaping')->find($id);

        if($intern){

            if($request->isMethod('post')){
                $data  = $request->all();
                $request->validate([
                    'name' => 'required|string|between:3,100',
                    'lastname' => 'required|string|between:3,100',
                    'email' => 'required',
                    'mobile' => ['required', 'regex:/^\d{10,12}$/'],
                    'intern_section' => 'required',
                ]);

                /*$mobileNumber = '+91' . $data['mobile'];
                $userExists = User::where('mobile_no', $mobileNumber)->exists();
                if ($userExists > 0) {
                    return redirect()->back()->withInput()->withErrors(['mobile' => 'The mobile number has already been taken.']);
                }*/

                $message = "Updated intern details";
                if($request->hasFile('image')) {
                    $file = $request->file('image');
                    $destinationPath = "images/profile";
                    $imagePath = UserHelper::uploadImage($file, $destinationPath);
                    $intern->intern->profile_photo = $imagePath;
                }

                $status = '0';
                if (isset($data['status']) && $data['status'] == 'on') {
                    $status = '1';
                }

                $intern->name = $data['name'];
                $intern->email = $data['email'];
                $intern->mobile_no = "+91".$data['mobile'];
                //$intern->password = bcrypt('arogyadhama@123');
                $intern->role = 3;
                $intern->status = $status;
                $intern->save();

                $intern->intern->firstname = $data['name'];
                $intern->intern->lastname = $data['lastname'];
                $intern->intern->email = $data['email'];
                $intern->intern->mobile_no = "+91".$data['mobile'];
                $intern->intern->status = $status;
                $intern->intern->save();

                //section update
                $selectedSectionIds = $data['intern_section'];

                $sectionsToAdd = array_diff($selectedSectionIds, $intern->sections->pluck('id')->toArray());

                // Detach old records that are not in the selectedSectionIds
                $sectionsToRemove = $intern->sections->pluck('id')->diff($selectedSectionIds);
                $intern->sections()->detach($sectionsToRemove);

                //Attach new sections
                $attachData = [];
                foreach ($sectionsToAdd as $sectionId) {
                    $attachData[$sectionId] = [
                        'is_active' => '1', 
                        'status' => '1',
                        'created_at'=> now(), 
                    ];
                }
                $intern->sections()->attach($attachData);
                return redirect()->back()->with('success', $message);
            }
        }
       
        $sections = Section::get();
        return view('admin.internupdate', compact('sections','intern'));

        
    }



    public function doctorupdate(Request $request, $id){

        $doctor = User::with('doctor','sections','sectionMaping')->find($id);
        if($doctor){

            if($request->isMethod('post')){
                $data  = $request->all();
                $request->validate([
                    'name' => 'required|string|between:3,100',
                    'lastname' => 'required|string|between:3,100',
                    'email' => 'required',
                    'mobile' => 'required|regex:/^\d{10,12}$/|unique:users,mobile_no',
                    'doctor_section' => 'required',
                ]);

                $mobileNumber = '+91' . $data['mobile'];
                $userExists = User::where('mobile_no', $mobileNumber)->where('id', '!=', $id)->exists();
                if ($userExists > 0) {
                    return redirect()->back()->withInput()->withErrors(['mobile' => 'The mobile number has already been taken.']);
                }

                $message = "Updated doctor details";
                if($request->hasFile('image')) {
                    $file = $request->file('image');
                    $destinationPath = "images/profile";
                    $imagePath = UserHelper::uploadImage($file, $destinationPath);
                    $doctor->doctor->profile_photo = $imagePath;
                }

                $status = '0';
                if (isset($data['status']) && $data['status'] == 'on') {
                    $status = '1';
                }

                $doctor->name = $data['name'];
                $doctor->email = $data['email'];
                $doctor->mobile_no = "+91".$data['mobile'];
                //$doctor->password = bcrypt('arogyadhama@123');
                $doctor->role = 2;
                $doctor->status = $status;
                $doctor->save();

                $doctor->doctor->firstname = $data['name'];
                $doctor->doctor->lastname = $data['lastname'];
                $doctor->doctor->email = $data['email'];
                $doctor->doctor->mobile_no = "+91".$data['mobile'];
                $doctor->doctor->status = $status;
                $doctor->doctor->save();


                //section update
                $selectedSectionIds = $data['doctor_section'];

                $sectionsToAdd = array_diff($selectedSectionIds, $doctor->sections->pluck('id')->toArray());

                // Detach old records that are not in the selectedSectionIds
                $sectionsToRemove = $doctor->sections->pluck('id')->diff($selectedSectionIds);
                $doctor->sections()->detach($sectionsToRemove);

                //Attach new sections
                $attachData = [];
                foreach ($sectionsToAdd as $sectionId) {
                    $attachData[$sectionId] = [
                        'is_active' => '1', 
                        'status' => '1', 
                    ];
                }
                $doctor->sections()->attach($attachData);
                return redirect()->back()->with('success', $message);
            }
        }

        $sections = Section::get();
        return view('admin.doctorupdate', compact('sections','doctor'));

    }



    public function therapist(Request $request){
        $filterData  = $request->only('section','search','table_size');
        $tablesize = $filterData['table_size'] ?? 10;
        $sections = Section::all();
        $therapist = Therapist::with('sections')
        ->search($filterData)
        ->sortable()
        ->orderBy('firstname', 'asc')
        ->paginate($tablesize);
        
        return view('admin.therapist.therapists')->with(['therapists'=>$therapist, 'sections'=>$sections, 'filterdata'=>$filterData, 'page_type'=>'admin']);
    }
    
    public function addTherapists(Request $request){
        $sections = Section::get();
        if($request->isMethod('post')){
            
            $data = $request->all();

            // echo "<pre>";
            // print_r($data);
            // die;

            $request->validate([
                'firstname' => 'required|string|between:3,100',
                'lastname' => 'required|string|between:3,100',
                'email' => 'required|email|unique:users,email',
                'mobile_no' => ['required', 'regex:/^\d{10,12}$/'],
                'therapist_section' => 'required',
            ]);

            $therapist = new Therapist;
            $message = "Added new Therapist";

            $status = '0';
            if (isset($data['status']) && $data['status'] == 'on') {
                $status = '1';
            }

            $therapist->firstname = $data['firstname'];
            $therapist->lastname = $data['lastname'];
            $therapist->email = $data['email'];
            $therapist->mobile_no = "+91".$data['mobile_no'];
            $therapist->section_id = $data['therapist_section'];
            $therapist->status = $status;
            $therapist->save();

            return redirect()->back()->with('success', $message);

        }


        return view('admin.therapist.therapistadd', compact('sections'));
    }

    public function therapistsUpdate(Request $request, $id=null){
        $therapist = Therapist::find($id);
        $sections = Section::get();

        if($request->isMethod('post')){
            
            $data = $request->all();

            $request->validate([
                'firstname' => 'required|string|between:3,100',
                'lastname' => 'required|string|between:3,100',
                'email' => 'required|email|unique:users,email',
                'mobile_no' => ['required', 'regex:/^\d{10,12}$/'],
                'therapist_section' => 'required',
            ]);

            $therapist = Therapist::find($id);
            $message = "Updated Therapist";

            $status = '0';
            if (isset($data['status']) && $data['status'] == 'on') {
                $status = '1';
            }

            $therapist->firstname = $data['firstname'];
            $therapist->lastname = $data['lastname'];
            $therapist->email = $data['email'];
            $therapist->mobile_no = "+91".$data['mobile_no'];
            $therapist->section_id = $data['therapist_section'];
            $therapist->status = $status;
            $therapist->save();

            return redirect()->back()->with('success', $message);

        }


        return view('admin.therapist.therapistupdate', compact('sections','therapist'));
    }

    public function therapistsView(Request $request){
        echo "okay";
    }

    public function therapistsDelete(Request $request, $id=null){
        $therapist = Therapist::find($id);
        if ($therapist) {
            $therapist->delete();
            return redirect()->back()->with('success', "Deleted Therapist");
        }
    }


    public function weeklySchedule(){

        $therapy = Therapy::with('therapyDepartment')->get();
        $days = WeekDay::get();
        return view('admin.weeklytherapy')->with(['therapies'=>$therapy, 'page_type'=>'admin','days'=>$days]);
    }


    public function addweeklySchedule(Request $request, $id = null){

        $weekday = WeekDay::get();
        $departments = Department::where('status', '1')->get();
        $therapy = WeeklySchedule::with('therapy')->find($id);

        $departmentTherapy ='';
        if($therapy){
            $departmentId  = $therapy->department_id??'';
            $departmentTherapy  = Therapy::where('department_id', $departmentId)->get();
        }


        if($request->isMethod('post')){

            $data = $request->all();
            $request->validate([
                'start_time' => 'required',
                'end_time' => 'required',
                'Selectedtherapy_id' => 'required',
                'day' =>'required',
                'status'=>'required'
            ]);

            $startTime = $data['start_time'].':00';
            $endTime  = $data['end_time'].':00';
            $dayId = $data['day'];

            if($id){
                $weekschedule = WeeklySchedule::find($id);
                $message = "Updated schedule";

            }else{
                $weekschedule = new weeklySchedule;
                $message = "Added new schedule";

            $recordCount = WeeklySchedule::where('day_id', $dayId)->whereBetween('therapy_start_time', [$startTime, $endTime])->count();
                if($recordCount >0){
                    return redirect()->back()->with(['fail'=>'Time slot already taken']);
                }

            }

            $status = '0';
            if (isset($data['status']) && $data['status'] == 'on') {
                $status = '1';
            }


            $weekschedule->day_id = $dayId;
            $weekschedule->therapy_id = $data['Selectedtherapy_id'];
            $weekschedule->department_id = $data['therapyDepartment'];
            $weekschedule->therapy_start_time = $startTime;
            $weekschedule->therapy_end_time =  $endTime;

            $weekschedule->status = $status;
            $weekschedule->save();


            //Update theray start & end time
            if($data['Selectedtherapy_id']){
                $therapy = Therapy::find($data['Selectedtherapy_id']);
                $therapy->start_time = $startTime;
                $therapy->end_time = $endTime;
                $therapy->save();
            }

            return redirect()->back()->with('success', $message);


        }

        return view('admin.addtherapyweeklyform')->with(['weekday'=>$weekday, 'therapy'=>$therapy,'page_type'=>'admin',
            'route_type'=>'schedule','departments'=>$departments, 'departmentTherapy'=>$departmentTherapy]);
    }


    public function  daySchedule(Request $request, $id=null){

        $weekDay = WeekDay::with(['weeklySchedules' => function ($query) {
            $query->select('id', 'day_id', 'therapy_id','therapy_start_time','therapy_end_time','status');
        }, 'weeklySchedules.therapy:id,therapy_name'])
        ->find($id);



         return view('admin.daytherepy')->with(['daytherapys'=>$weekDay,'page_type'=>'admin']);
    }


    public function deletedayTherapy(Request $request, $id=null){

        $weekschedule = WeeklySchedule::find($id);
        $weekschedule->delet();
        return redirect()->back()->with('success', 'Delete therapy successfully');
    }


    public function usersLog(Request $request){
        //$usersLog = UserLog::with('user')->get();
        $usersLog = UserLog::with('user')->orderBy('id', 'desc')->paginate(15);
        return view('admin.userslog')->with(['usersLogs'=>$usersLog,'page_type'=>'admin']);
    }


    public function paymentDetails(){

        $payments = PaymentDetail::orderBy('id', 'desc')->get();
        return view('admin.paymentdetail')->with(['payments'=>$payments,'page_type'=>'admin']);
    }


    public function addPayment(Request $request, $id=null){


        if($request->isMethod('post')){
            $data = $request->all();

            $request->validate([
                'name' => 'required',
                'price' => 'required',
            ]);

            if($id){
                $payment = PaymentDetail::find($id);
                $message = "Updated your payment details";
            }else{
                $payment = new PaymentDetail;
                $message = "Added new payment";
            }

            $status = '0';
            if (isset($data['status']) && $data['status'] == 'on') {
                $status = '1';
            }

            $payment->payment_detail_name = $data['name'];
            $payment->price = $data['price'];
            $payment->status = $status;
            $payment->save();
            return redirect()->back()->with('success', $message);

        }
        
        $payments = PaymentDetail::select('id','payment_detail_name','price','status')->where('id',$id)->first();

        return view ('admin.paymentform')->with(['payments'=>$payments,'page_type'=>'admin']);

    }



    public function deletePayment(Request $request, $id=null){

        $payment = PaymentDetail::find($id);
        if ($payment) {
            $payment->delete();
            return redirect()->back()->with('success', "Deleted payment details");
        }

    }


}
