<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PatientDefaultDailyChart;
use App\Models\Venue;
use App\Helpers\UserHelper;
use JWTAuth;

class PatientdefaultdailychartController extends Controller
{
    public function defaultdailychart(Request $request){

        try {
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
                'default_venue',
                'description',
                'app_type',
                'order',
                )->where('status', '1')->get()->toArray();

                // $location = [
                //     'english'=> 'Section (E) : English',
                //     'hindi'=> 'Section (B) : Hindi',
                //     'kannada'=>'Section (D) : Kannada'
                // ];


                $location = [
                    'english'=> 'Section(F) : English - Daya',
                    'hindi'=> 'Section(G) : Hindi - Gambhira',
                    'kannada'=>'Section(D) : Kannada - Karuna'
                ];
        
                $chartotherpatientFilter = [];
                foreach ($defaultdailyChart as $key => $chart) {

                    $chartotherpatientFilter[$key] = $chart;

                    if($chart['section_id'] >0){
                        $chartotherpatientFilter[$key]['sections'] = UserHelper::getTherapySectionwise($chart['section_id'],null);
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
            echo  $th->getMessage();
            return response()->json(['status_code' => 500,'message' => 'Some things went to wrong'], 500);
        }

    }

    public function mapLonglat(Request $request){

        $token = $request->bearerToken();
        $user = JWTAuth::authenticate($token);

        try {
            
            $location = Venue::whereIn('id', function ($query) {
                $query->selectRaw('MIN(id)')
                    ->from('venues')
                    ->groupBy('name');
            })->select('id', 'name', 'longitude', 'latitude')
            ->get();

            return response()->json([
                'status_code' => 200,
                'message' => 'Map location',
                'data' =>$location
            ], 200);


        } catch (\Throwable $th) {
            return response()->json(['status_code' => 500,'message' => 'Some things went to wrong'], 500);
        }

    }

}
