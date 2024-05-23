<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Role;
use App\Models\Department;
use App\Models\Section;
use App\Models\Intern;
use Auth;
use DB;
use Image;
use File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Helpers\UserHelper;
use App\Models\PatientProfile;
use App\Models\UserSectionsMaping;
use Carbon\Carbon;


class InternController extends Controller
{
    public function index(Request $request){
        try{

        $intern = Auth::user();

        $startDate = $request->only('start_date');
        $endDate = $request->only('end_date');

        $getTotalUsers = User::where('role', 4)->filterByDateRange($startDate, $endDate)->count();
        $dischargePatient =  User::where(['role'=>4, 'is_active'=>'0'])->filterByDateRange($startDate, $endDate)->count();
        $newPatient = User::where(['role'=>4, 'is_active'=>'1'])->filterByDateRange($startDate, $endDate)->count();
        $getTotalDoctor =  User::where('role',2)->filterByDateRange($startDate, $endDate)->count();
        $getTotalIntern  =  User::where('role',3)->filterByDateRange($startDate, $endDate)->count();


           $internData = DB::table('users')
                ->join('interns', 'users.id', '=', 'interns.user_id')
                ->leftJoin('user_sections_mapings', 'users.id', '=', 'user_sections_mapings.user_id')
                ->leftJoin('sections', 'user_sections_mapings.section_id', '=', 'sections.id')
                ->select(
                    'users.id',
                    'users.email as user_email',
                    'users.name',
                    'users.role',
                    'users.mobile_no as mobile',
                    'interns.*',
                    'sections.name as section_name',
                    'sections.id as section_id',
                )
                ->where('users.role', 3)
                ->where('users.id', $intern->id)
                ->get()
                ->first();




            $internProfile = "";
            if(!empty($internData)){
                $internProfile = $internData;
            }else{
                $internProfile = $intern;
            }

            //Section wise doctor count
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
                $patientCount = UserSectionsMaping::whereBetween('section_active_date', [$firstDayOfMonth, $lastDayOfMonth])
                    ->count();
                $monthlyPatientCounts[] = $patientCount;
            }
            $monthlyPatient = implode(',', $monthlyPatientCounts);
            return view('intern')->with(['intern'=>$internProfile, 'sectiondoctors'=>$countValuesString, 'monthlyPatient'=>$monthlyPatient, 'route_type'=>'dashboard', 'getTotalUsers'=>$getTotalUsers,'dischargePatient'=>$dischargePatient, 'newPatient'=>$newPatient, 'getTotalDoctor'=>$getTotalDoctor,'getTotalIntern'=>$getTotalIntern]);

        } catch (\Exception $e) {
            return response()->json(['status_code' => 500, 'error' => $e->getMessage()], 500);
        }
    }

    public function InternProfile(Request $request){

        try{
            $intern = Auth::user();
            $departments = Department::take('5')->get();
            $sections = Section::all();

            $internData =DB::table('users')
                    ->join('interns', 'users.id', '=', 'interns.user_id')
                    ->leftJoin('user_sections_mapings', 'users.id', '=', 'user_sections_mapings.user_id')
                    ->leftJoin('sections', 'user_sections_mapings.section_id', '=', 'sections.id')
                    ->select('users.id', 'users.email as user_email', 'users.name', 'users.role', 'users.mobile_no as mobile', 'interns.*', 'sections.name as section_name')
                    ->where('users.role', 3)
                    ->where('users.id', $intern->id)
                    ->get()
                    ->first();

            $internProfile = "";
            if(!empty($internData)){
                $internProfile = $internData;
            }else{
                $internProfile = $intern;
            }


                if ($request->ajax()){

                    $data = $request->all();

                    $firstname = $data['firstname'];
                    $lastname = $data['lastname'];
                    $fullname = $firstname.' '.$lastname;
                    $email = $data['email'];
                    $mobile = $data['mobile'];
                    $mobilno = "+91".$mobile;
                    $internId = $data['internId'];
                
                    $validator = Validator::make($request->all(), [
                        'firstname' => 'required',
                        'lastname' => 'required',
                        'email' => 'required',
                        'mobile' => 'required|numeric',
                    ]);


                    if ($validator->fails()) {
                        return response()->json(['status_code' => 0,'error' => $validator->errors()->toArray()]);
                    }else{

                        $userUpdated =  DB::table('users')->where('id',$internId)->update(['name'=>$fullname,'email'=>$email,'mobile_no'=>$mobilno]);

                        $internCount = DB::table('interns')->where('user_id',$internId)->count();
                        if($internCount >0){


                            if($request->hasFile('profile_photo')){
                                $file = $request->file('profile_photo');
                                $imageName = time().'.'.$file->extension(); 
                                $path_img = "images/profile/".$imageName;
                                Image::make($file)->resize('100','100')->save($path_img);
                                $profile_photot = $path_img;

                                DB::table('interns')->where('user_id',$internId)->update([
                                    'firstname'=>$firstname,
                                    'lastname'=>$lastname,
                                    'email'=>$email,
                                    'mobile_no'=>$mobilno,
                                    'profile_photo'=>$profile_photot
                                ]);


                            }else{

                                DB::table('interns')->where('user_id',$internId)->update([
                                    'firstname'=>$firstname,
                                    'lastname'=>$lastname,
                                    'email'=>$email,
                                    'mobile_no'=>$mobilno,
                                ]);

                            }

                        }else{

                            DB::table('interns')->insert([
                                'user_id' => $internId,
                                'firstname' => $firstname,
                                'lastname' => $lastname,
                                'email' => $email,
                                'mobile_no' => $mobilno,
                            ]);
                        }


                        return response()->json(['status_code' => 200,'message' => 'Successfully updated your profile',],200);

                    }

                }

            return view('admin.intern_profile')->with(['intern'=>$internProfile, 'departments'=>$departments, 'sections'=>$sections,'page_type'=>'admin']);
        } catch (\Exception $e) {
            return response()->json(['status_code' => 500, 'error' => $e->getMessage()], 500);
        }
    }



    public function internPasswordChange(Request $request){

        try{
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

        } catch (\Exception $e) {
            return response()->json(['status_code' => 500, 'error' => $e->getMessage()], 500);
        }

    }



    public function profileImageDelete(Request $request){

        try{
            if($request->ajax()){
            $internId = $request->input('internId');
            $user = Auth::user();
            $internProfileImage = DB::table('interns')->select('profile_photo')->where('user_id',$user->id)->first();

            $imagePath = public_path($internProfileImage->profile_photo);
                if (file_exists($imagePath)) {
                    unlink($imagePath);

                $affectedRows =  DB::table('interns')->where('user_id', $user->id)->update(['profile_photo' => null]);

                    if ($affectedRows > 0) {
                        return response()->json([
                            'status_code' => 200,
                            'message' => 'Successfully deleted profile image',
                        ],200);
                    }
                }else{
                    return response()->json([
                        'status_code' =>0,
                        'message' =>'Some thing went to wrong',
                    ],200);

                }

            }

        } catch (\Exception $e) {
            return response()->json(['status_code' => 500, 'error' => $e->getMessage()], 500);
        }
    }

    
}
