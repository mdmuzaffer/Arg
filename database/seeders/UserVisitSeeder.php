<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\UserVisit;

class UserVisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                 
        $userVisits = [
            ['patient_id'=>94, 'doctor_id'=>3, 'date'=>Carbon::now(), 'notes'=>'New patient', 'status'=>'1'],
            ['patient_id'=>95, 'doctor_id'=>4, 'date'=>Carbon::now(), 'notes'=>'New patient improve', 'status'=>'1'],
            ['patient_id'=>96, 'doctor_id'=>6, 'date'=>Carbon::now(), 'notes'=>'New patient good condition', 'status'=>'1'],
        ];

        foreach ($userVisits as $key => $value) {
            UserVisit::create($value);
        }
        
    }
}
