<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AppIcone;
class AppiconeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $appIcones = [
            ['app_type' =>'treatmentchart', 'app_title' => 'Treatment chart', 'app_description'=>'treatment chart', 'app_icone'=>'/images/icone/TreatmentChartIcon.png', 'reference_id'=>1, 'apptype'=>1, 'status' => 1],

            ['app_type' =>'dietchart', 'app_title' => 'Diet chart', 'app_description'=>'Diet chart', 'app_icone'=>'/images/icone/DietChartIcon.png', 'reference_id'=>2, 'apptype'=>2, 'status' => 1],

            ['app_type' =>'casedetails', 'app_title' => 'Case details', 'app_description'=>'case details', 'app_icone'=>'/images/icone/CaseDetailIcon.png', 'reference_id'=>3, 'apptype'=>3, 'status' => 1],

            ['app_type' =>'dailychart', 'app_title' => 'Daily report', 'app_description'=>'daily report', 'app_icone'=>'/images/icone/DailyReportIcon.png', 'apptype'=>4, 'reference_id'=>4, 'status' => 1],

            ['app_type' =>'payment', 'app_title' => 'Payment history', 'app_description'=>'payment', 'app_icone'=>'/images/icone/PaymentIcon.png', 'apptype'=>5, 'reference_id'=>5, 'status' => 1],

            ['app_type' =>'discharge', 'app_title' => 'Discharge summary', 'app_description'=>'Discharge summary', 'app_icone'=>'/images/icone/DischargeIcon.png', 'apptype'=>6, 'reference_id'=>6, 'status' => 1],
        ];
        
        foreach ($appIcones as $key => $value) {
            AppIcone::create($value);
        }
    }
}
