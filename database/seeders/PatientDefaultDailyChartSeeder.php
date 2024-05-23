<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PatientDefaultDailyChart;

class PatientDefaultDailyChartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultTherapy = [

            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'05:20:00','end_time' =>'05:50:00', 'therapy_name'=>'OM meditation', 'description'=>'',  'order'=>1, 'is_default'=>1,'is_language'=>1, 'app_type'=>1, 'status'=>'1'],

            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'06:00:00','end_time' =>'06:55:00', 'therapy_name'=>'Special Technique', 'section_id'=>1, 'description'=>'', 'order'=>2,'is_default'=>1, 'is_language'=>1, 'app_type'=>2, 'status'=>'1'],

            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'07:00:00','end_time' =>'08:00:00', 'therapy_name'=>'Maitri Milan', 'description'=>'', 'order'=>3, 'is_default'=>1, 'default_venue'=>12, 'app_type'=>3, 'status'=>'1'],

            ['department_id' => 7, 'group_id'=>1, 'therapy_name'=>'Breakfast', 'start_time' =>'08:00:00','end_time' =>'08:50:00', 'description'=>'',  'order'=>4, 'is_default'=>1, 'default_venue'=>11, 'app_type'=>4, 'status'=>'1'],

            ['department_id' => 6, 'group_id'=>0, 'start_time' =>'09:00:00','end_time' =>'10:00:00', 'therapy_name'=>'Parameters & Consultation', 'description'=>'', 'order'=>5, 'section_id'=>1, 'is_default'=>1, 'app_type'=>5, 'status'=>'1'],


            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'10:10:00','end_time' =>'10:50:00', 'therapy_name'=>'IAYT Lecture', 'description'=>'', 'order'=>111, 'is_default'=>0, 'is_language'=>1, 'is_day'=>'Tuesday', 'app_type'=>1, 'status'=>'1'],

            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'10:10:00','end_time' =>'10:50:00', 'therapy_name'=>'KRIYA', 'description'=>'', 'order'=>111, 'is_default'=>0, 'is_language'=>1, 'is_day'=>'Wednesday', 'app_type'=>1, 'status'=>'1'],

            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'10:10:00','end_time' =>'10:50:00', 'therapy_name'=>'DIET', 'description'=>'', 'order'=>111, 'is_default'=>0, 'is_language'=>1, 'is_day'=>'Thursday', 'app_type'=>1, 'status'=>'1'],

            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'10:10:00','end_time' =>'10:50:00', 'therapy_name'=>'PRANAMAYA KOSHA', 'description'=>'', 'order'=>111, 'is_default'=>0, 'is_language'=>1, 'is_day'=>'Friday', 'app_type'=>1, 'status'=>'1'],

            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'10:10:00','end_time' =>'10:50:00', 'therapy_name'=>'YAMA & NIYAMA', 'description'=>'', 'order'=>111, 'is_default'=>0, 'is_language'=>1, 'is_day'=>'Saturday', 'app_type'=>1, 'status'=>'1'],

            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'10:10:00','end_time' =>'10:50:00', 'therapy_name'=>'MANOMAYA & VIJNYANMAYA KOSHA', 'description'=>'', 'order'=>111, 'is_default'=>0, 'is_language'=>1, 'is_day'=>'Sunday', 'app_type'=>1, 'status'=>'1'],

            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'10:10:00','end_time' =>'10:50:00', 'therapy_name'=>'DISCHARGE LECTURE', 'description'=>'', 'order'=>111, 'is_default'=>0, 'is_language'=>1, 'is_day'=>'Monday', 'app_type'=>1, 'status'=>'1'],





            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'11:00:00','end_time' =>'11:50:00', 'therapy_name'=>'Pranayama', 'description'=>'',   'order'=>7, 'is_default'=>1, 'is_language'=>1, 'app_type'=>7, 'status'=>'1'],

            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'12:00:00','end_time' =>'13:00:00', 'therapy_name'=>'Special Technique', 'section_id'=>1, 'description'=>'',  'order'=>8,'is_default'=>1, 'is_language'=>1, 'app_type'=>8, 'status'=>'1'],

            ['department_id' => 7, 'group_id'=>3, 'therapy_name'=>'Lunch', 'start_time' =>'13:00:00','end_time' =>'14:00:00', 'description'=>'',  'order'=>9, 'is_default'=>1, 'default_venue'=>11, 'app_type'=>9, 'status'=>'1'],

            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'15:00:00','end_time' =>'15:50:00', 'therapy_name'=>'Cyclic Meditation', 'description'=>'', 'order'=>10, 'is_default'=>1, 'is_language'=>1, 'app_type'=>10, 'status'=>'1'],

            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'16:00:00','end_time' =>'17:00:00', 'therapy_name'=>'Special Technique', 'section_id'=>1, 'description'=>'',  'order'=>11,'is_default'=>1, 'is_language'=>1, 'app_type'=>11, 'status'=>'1'],

            ['department_id' => 7, 'group_id'=>4, 'start_time' =>'17:00:00','end_time' =>'17:10:00', 'therapy_name'=>'Kashayam', 'description'=>'',  'order'=>12, 'is_default'=>1, 'default_venue'=>11, 'app_type'=>12, 'status'=>'1'],

            ['department_id' => 0, 'group_id'=>0, 'start_time' =>'17:15:00','end_time' =>'18:00:00', 'therapy_name'=>'Tuning to nature', 'description'=>'',  'order'=>13, 'is_default'=>1, 'default_venue'=>13, 'app_type'=>13, 'status'=>'1'],

            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'18:00:00','end_time' =>'18:25:00', 'therapy_name'=>'Bhajan', 'description'=>'',   'order'=>14, 'is_default'=>1, 'default_venue'=>12, 'app_type'=>14, 'status'=>'1'],

            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'18:30:00','end_time' =>'19:30:00', 'therapy_name'=>'Trataka & MSRT', 'description'=>'',   'order'=>15, 'is_default'=>1, 'is_language'=>1, 'app_type'=>15, 'status'=>'1'],

            ['department_id' => 7, 'group_id'=>5, 'therapy_name'=>'Normal Dinner', 'start_time' =>'19:30:00','end_time' =>'20:20:00','description'=>'',  'order'=>16, 'is_default'=>1, 'default_venue'=>11, 'app_type'=>16, 'status'=>'1'],

            ['department_id' => 0, 'group_id'=>0, 'start_time' =>'20:30:00','end_time' =>'21:00:00', 'therapy_name'=>'Happy Assembly (Wednesday, Friday & Sunday)', 'description'=>'',  'order'=>17, 'is_default'=>1, 'default_venue'=>8, 'app_type'=>16, 'status'=>'1'],

        ];


        foreach ($defaultTherapy as $key => $value) {
            PatientDefaultDailyChart::create($value);
        }
    }
}
