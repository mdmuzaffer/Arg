<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use PDF;
use File;
use DB;
use JWTAuth;
use App\Models\UserVisit;
use App\Models\DietGroup;
use App\Models\UserDailychart;
use App\Models\UserDailyReport;
use App\Models\WeekDay;
use App\Models\User;
use Carbon\Carbon;

class SummerydetailController extends Controller
{
    
    public function summaryDetails(Request $request){

    try {
    
        $token = $request->bearerToken();
        $user = JWTAuth::authenticate($token);
        $date = $request->input('date');
        $department = $user->sections[0]->name;
        $accomudation = $user->userDetails->accommodation;

        $userData = User::with([
            'userDetails.language',
            'userDetails.accommodation',
            'userDetails.section',
            ])->find($user->id);


        // echo "<pre>";
        // print_r($userData['userDetails']['age']);
        // die;


       $userviteId = DB::table('user_visits')->where('patient_id',$user->id)
       ->select('id','patient_id','doctor_id','date','notes','status')->first();

        //$url =  $this->generatePDF($tharapy, $diets);

       if(!empty($userviteId)){

        $datename = Carbon::createFromFormat('Y-m-d', $date);
        $dayName = $datename->format('l');
        $weekDay = WeekDay::where('day', $dayName)->first();
    
        $visitId = $userviteId->id;
        $userTherapy = UserDailychart::with('department','doctor','intern','patient','therapy.group','venue')
            ->where('user_visit_id', $visitId)
            //->where('date', '=', $date)
            ->where('is_day', '=', $weekDay->id)
            ->get()->toArray();
        
            $groupedTherapies = array();

            foreach ($userTherapy as $item) {
                $date = $item['date'];
                $therapyName = $item['therapy']['therapy_name'];
            
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

            $therapy = $groupedTherapies[0]['therapy_name'];
            $userTherapyPdf = UserDailychart::with('therapy.group')->where('user_visit_id', $visitId)->get()->toArray();


            //Check week no for PDF
            $userTherapyDepartment = UserDailychart::with('department')
            ->where('user_visit_id', $visitId)
            ->get()->toArray();

            $weeklyArray = [];
            foreach ($userTherapyDepartment as $appointment) {
                $date = $appointment['date'];
                $weekNumber = date('W', strtotime($date));
                
                if (!isset($weeklyArray[$weekNumber])) {
                    $weeklyArray[$weekNumber] = [];
                }
                
                $weeklyArray[$weekNumber][] = $appointment;
            }
            ksort($weeklyArray);
            $weeklyArray = array_values($weeklyArray);

            $weekno =[];
            foreach ($weeklyArray as $key => $value) {
               $weekno[$key] = $key;
            }

            array_pop($weekno);

            //Check week no for PDF end
            
            $url =  $this->generatePDF($userTherapyPdf, $userData, $userviteId, $weekno);

            // added it for shorting
            $therapy = $groupedTherapies[0]['therapy_name'];
            sort($therapy);

            $summary = [];
            $summary['pdf_url'] =  $url;
            $summary['department'] = $department;
            $summary['date'] = $groupedTherapies[0]['date'];
            $summary['therapy'] = $therapy;

            return response()->json([
                'status_code' => 200,
                'message' => 'found user treatment data',
                'data' =>$summary
            ],200);

           }else{

            return response()->json([
                'status_code' => 200,
                'message' => 'User treatment data not found',
                'data' =>[]
            ],200);

           }

        }else{

            return response()->json([
                'status_code' => 404,
                'message' => 'User treatment not found',
                'data' =>[]
            ],404);
        }

    }catch (\Throwable $th) {
            echo  $th->getMessage();
            return response()->json(['status_code' => 500,'message' => 'Something went to wrong'], 500);
        }

    }


     public function generatePDF($tharapy, $userData, $userviteId, $weekno)
        {

            try {

                $naturopathy = DB::table('therapies')->select('id','therapy_name','department_id')
                ->where('department_id',3)->get();

                $assignednaturopathy = DB::table('user_dailycharts')
                ->select('id', 'patient_id','user_visit_id','department_id','therapy_id','date','is_day')
                ->where(['user_visit_id'=>$userviteId->id,'department_id'=>3])
                ->get();


                $ayurvedha = DB::table('therapies')->select('id','therapy_name','department_id')
                ->where('department_id',2)->get();
                $assignedayurvedha = DB::table('user_dailycharts')
                ->select('id', 'patient_id','user_visit_id','department_id','therapy_id','date','is_day')
                ->where(['user_visit_id'=>$userviteId->id,'department_id'=>2])
                ->get();

                $yoga = DB::table('therapies')->select('id','therapy_name','department_id')
                ->where('department_id',1)->get();

                $assignedyoga = DB::table('user_dailycharts')
                ->select('id', 'patient_id','user_visit_id','department_id','therapy_id','date','is_day')
                ->where(['user_visit_id'=>$userviteId->id,'department_id'=>1])
                ->get();

                $physiotheraphy = DB::table('therapies')->select('id','therapy_name','department_id')
                ->where('department_id',4)->get();

                $assignedphysiotheraphy = DB::table('user_dailycharts')
                ->select('id', 'patient_id','user_visit_id','department_id','therapy_id','date','is_day')
                ->where(['user_visit_id'=>$userviteId->id,'department_id'=>4])
                ->get();

                $acupuncture = DB::table('therapies')->select('id','therapy_name','department_id')
                ->where('department_id',5)->get();

                $assignedacupuncture = DB::table('user_dailycharts')
                ->select('id', 'patient_id','user_visit_id','department_id','therapy_id','date','is_day')
                ->where(['user_visit_id'=>$userviteId->id,'department_id'=>5])
                ->get();


                $counseling = DB::table('therapies')->select('id','therapy_name','department_id')
                ->where('department_id',6)->get();

                $assignedcounseling = DB::table('user_dailycharts')
                ->select('id', 'patient_id','user_visit_id','department_id','therapy_id','date','is_day')
                ->where(['user_visit_id'=>$userviteId->id,'department_id'=>6])
                ->get();

                $userTherapyGroups = UserDailychart::with('therapy.group')
                ->where(['user_visit_id'=>$userviteId->id, 'department_id'=>7])
                ->get()->toArray();

                $breakfastArray = [];
                $lunchArray = [];
                $dinnerArray = [];
                $juicesArray = [];
                $snacksArray = [];

                foreach ($userTherapyGroups as $element) {
                    $groupName = $element['therapy']['group']['name'];
                    switch ($groupName) {
                        case 'Breakfast':
                            $breakfastArray[] = $element;
                            break;
                        case 'Lunch':
                            $lunchArray[] = $element;
                            break;
                        case 'Dinner':
                            $dinnerArray[] = $element;
                            break;
                        case 'Juices':
                            $juicesArray[] = $element;
                            break;
                        case 'Snacks':
                            $snacksArray[] = $element;
                            break;
                        // Add more cases for other groups if needed
                    }
                }
            
                $breakfast = DB::table('therapies')->select('id','therapy_name','department_id')
                ->where(['department_id'=>7,'group_id'=>1])->get();

                $juices = DB::table('therapies')->select('id','therapy_name','department_id')
                ->where(['department_id'=>7,'group_id'=>2])->get();

                $lunch = DB::table('therapies')->select('id','therapy_name','department_id')
                ->where(['department_id'=>7,'group_id'=>3])->get();

                $snacks = DB::table('therapies')->select('id','therapy_name','department_id')
                ->where(['department_id'=>7,'group_id'=>4])->get();

                $dinner = DB::table('therapies')->select('id','therapy_name','department_id')
                ->where(['department_id'=>7,'group_id'=>5])->get();


                $imagePath = public_path('images/icone/checked.png');
                $imageData = File::get($imagePath);
                $base64Image = base64_encode($imageData);
                $image = '<img src="data:image/jpeg;base64,' . $base64Image . '">';

                $data = [
                    'tharapy' => $tharapy,
                    'userData' => $userData,
                    'userviteId'=> $userviteId,
                    'naturopathy'=>$naturopathy,
                    'assignednaturopathy'=>$assignednaturopathy,
                    'ayurvedha'=>$ayurvedha,
                    'assignedayurvedha'=>$assignedayurvedha,
                    'yoga'=>$yoga,
                    'assignedyoga'=>$assignedyoga,
                    'physiotheraphy'=>$physiotheraphy,
                    'assignedphysiotheraphy'=>$assignedphysiotheraphy,
                    'acupuncture'=>$acupuncture,
                    'assignedacupuncture'=>$assignedacupuncture,
                    'counseling'=>$counseling,
                    'assignedcounseling'=>$assignedcounseling,
                    'breakfast'=>$breakfast,
                    'assignedbreakfast'=>$breakfastArray,
                    'juices'=>$juices,
                    'assignedjuices'=>$juicesArray,
                    'lunch'=>$lunch,
                    'assignedlunch'=>$lunchArray,
                    'snacks'=>$snacks,
                    'assignedsnacks'=>$snacksArray,
                    'dinner'=>$dinner,
                    'assigneddinner'=>$dinnerArray,
                    'weekno'=>$weekno,
                    'image'=>$image
                ];

    
                $pdf = PDF::loadView('pdf.pdfdocument', $data);

               // $pdf->setPaper('A4', 'landscape');

               $pdf->setOptions([
                    'dpi' => 250,
                    'page-width' => '450mm',
                ]);
                
                $pdfPath = public_path('pdfs');
                $pdfName = 'generated_' . time() . '.pdf';
                $pdf->save($pdfPath . '/' . $pdfName);
                return $pdfUrl = asset('pdfs/' . $pdfName);
               // return response()->json(['pdf_url' => $pdfUrl]);
    
            } catch (\Throwable $th) {
                //echo  $th->getMessage();
                return response()->json(['status_code' => 500,'message' => 'Something went to wrong'], 500);
            }
        }


    public function userTreatmentpdfUpload(Request $request){

        try {
            $token = $request->bearerToken();
            $user = JWTAuth::authenticate($token);
            $date = $request->input('date');

            $validator = Validator::make($request->all(), [
                'treatmentpdf' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);


            if ($validator->fails()) {
                return response()->json([
                    'status_code' => 403,
                        'message' => $validator->messages()->first(),
                        'data' => []
                ],200);
            }


            if ($request->hasFile('treatmentpdf')) {

                $files = $request->file('treatmentpdf');
               
                if (is_array($files)) {

                    foreach ($files as $file) {
                        
                        $imageName = time().'.'.$file->extension(); 
                        $path_img = "pdfs/usertreatment";
                        $file->move($path_img, $imageName); // Adjust the storage location as needed

                        DB::table('user_treatment_pdfuploads')->insert([
                            'user_id' =>$user->id,
                            'email' => $user->email,
                            'treatment_pdf' =>$path_img.'/'.$imageName,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
        
                        return response()->json(['status_code' => 200,'message' => 'Files uploaded successfully.'], 200);
                    }
                } else {
                    //$filename = $files->getClientOriginalName();
                    $imageName = time().'.'.$files->extension(); 
                    $path_img = "pdfs/usertreatment";
                    $files->move($path_img, $imageName);
                    DB::table('user_treatment_pdfuploads')->insert([
                        'user_id' =>$user->id,
                        'email' => $user->email,
                        'treatment_pdf' =>$path_img.'/'.$imageName,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                    return response()->json(['status_code' => 200,'message' => 'Files uploaded successfully.'], 200);
                }
            }

           // return redirect()->back()->with('success', 'Files uploaded successfully.');

        } catch (\Throwable $th) {
            echo  $th->getMessage();
            return response()->json(['status_code' => 500,'message' => 'Something went to wrong'], 500);
        }

    }


    public function Settings(Request $request){

        try {

            $token = $request->bearerToken();
            $user = JWTAuth::authenticate($token);

            $userlanguage = $user->userDetails->language;

            $sectionId = $user->sectionMaping->section_id;
            $departmentName = $user->sectionMaping->section->name;
            
            $notification = DB::table('user_device_tokens')->select('id','user_id','notification_ison')->where('user_id',$user->id)->first();
            $settings = DB::table('app_setting_pages')->get();

            $languageSetting = new \stdClass();
            $languageSetting->id = 5;
            $languageSetting->setting_title = "Language";
            $languageSetting->setting_type = 5;
            $languageSetting->setting_icon = "/images/icone/language-icn.png";
            $languageSetting->userlanguage = $userlanguage;
            $settings[] = $languageSetting;

            return response()->json([
                'status_code' => 200,
                'message' => 'Settings data',
                'department'=>$departmentName,
                'data' =>$settings
            ],200);

        } catch (\Throwable $th) {
            //echo $th->getMessage();
            return response()->json(['status_code' => 500,'message' => 'Something went to wrong'], 500);
        }
    }

}
