<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\UserDailychart;

class userDailychartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $userDailyChart = [


            ['patient_id'=>94, 'user_visit_id'=>2, 'department_id'=>5, 'daily_notes'=>'This is test therapy', 'date'=>Carbon::now(), 'start_time'=>'11:30:00', 'end_time'=>'12:30:00', 'therapy_id'=>129, 'doctor_id'=>3, 'intern_id'=>6, 'venue_id'=>7, 'status'=>'1'],

            ['patient_id'=>95, 'user_visit_id'=>1, 'department_id'=>1, 'daily_notes'=>'This is test therapy', 'date'=>Carbon::now(), 'start_time'=>'12:00:00', 'end_time'=>'13:00:00', 'therapy_id'=>121, 'doctor_id'=>3, 'intern_id'=>4, 'venue_id'=>1, 'status'=>'1'],

            ['patient_id'=>96, 'user_visit_id'=>2, 'department_id'=>2, 'daily_notes'=>'This is test', 'date'=>Carbon::now(), 'start_time'=>'14:30:00', 'end_time'=>'15:00:00', 'therapy_id'=>92, 'doctor_id'=>6, 'intern_id'=>3, 'venue_id'=>5, 'status'=>'1'],

            ['patient_id'=>97, 'user_visit_id'=>1, 'department_id'=>4, 'daily_notes'=>'New therapy', 'date'=>Carbon::now(), 'start_time'=>'15:00:00', 'end_time'=>'16:00:00', 'therapy_id'=>150, 'doctor_id'=>3, 'intern_id'=>5, 'venue_id'=>6, 'status'=>'1'],

        ];

        foreach ($userDailyChart as $key => $value) {
            UserDailychart::create($value);
        }

    }
}
