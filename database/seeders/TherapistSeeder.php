<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Therapist;

class TherapistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           $therapist = [

            ['firstname' => 'Param', 'lastname'=>'', 'email'=>'', 'mobile_no'=>'', 'department_id'=>0, 'is_counseler'=>0, 'section_id'=>1, 'status' =>'1'],
            ['firstname' => 'Bikas Purohit', 'lastname'=>'', 'email'=>'', 'mobile_no'=>'', 'department_id'=>0, 'is_counseler'=>0,'section_id'=>2, 'status' =>'1'],
            ['firstname' => 'Sidhanagaraj', 'lastname'=>'', 'email'=>'', 'mobile_no'=>'', 'department_id'=>0, 'is_counseler'=>0,'section_id'=>3, 'status' =>'1'],
            ['firstname' => 'Soudhamini', 'lastname'=>'', 'email'=>'', 'mobile_no'=>'', 'department_id'=>0, 'is_counseler'=>0,'section_id'=>3, 'status' =>'1'],
            ['firstname' => 'Shankar', 'lastname'=>'', 'email'=>'', 'mobile_no'=>'', 'department_id'=>0,'is_counseler'=>0, 'section_id'=>4, 'status' =>'1'],
            ['firstname' => 'Jalandhar', 'lastname'=>'', 'email'=>'', 'mobile_no'=>'', 'department_id'=>0, 'is_counseler'=>0, 'section_id'=>5, 'status' =>'1'],
            ['firstname' => 'Tankeshwar', 'lastname'=>'', 'email'=>'', 'mobile_no'=>'', 'department_id'=>0, 'is_counseler'=>0, 'section_id'=>6, 'status' =>'1'],
            ['firstname' => 'Surajit', 'lastname'=>'', 'email'=>'', 'mobile_no'=>'', 'department_id'=>0, 'is_counseler'=>0, 'section_id'=>7, 'status' =>'1'],
            ['firstname' => 'Devendra', 'lastname'=>'', 'email'=>'', 'mobile_no'=>'', 'department_id'=>0, 'is_counseler'=>0, 'section_id'=>8, 'status' =>'1'],
            ['firstname' => 'Sonu Mourya', 'lastname'=>'', 'email'=>'', 'mobile_no'=>'', 'department_id'=>0, 'is_counseler'=>0, 'section_id'=>9, 'status' =>'1'],
            ['firstname' => 'Dipen', 'lastname'=>'', 'email'=>'', 'mobile_no'=>'', 'department_id'=>4, 'is_counseler'=>0, 'section_id'=>9, 'status' =>'1'],
            ['firstname' => 'Ranjit', 'lastname'=>'', 'email'=>'', 'mobile_no'=>'', 'department_id'=>4, 'is_counseler'=>0, 'section_id'=>9, 'status' =>'1'],
            ['firstname' => 'Aditya', 'lastname'=>'', 'email'=>'', 'mobile_no'=>'', 'department_id'=>4, 'is_counseler'=>0, 'section_id'=>9, 'status' =>'1'],
            ['firstname' => 'Rita', 'lastname'=>'', 'email'=>'', 'mobile_no'=>'', 'department_id'=>4, 'is_counseler'=>0, 'section_id'=>9, 'status' =>'1'],
            ['firstname' => 'Pinky', 'lastname'=>'', 'email'=>'', 'mobile_no'=>'', 'department_id'=>4, 'is_counseler'=>0, 'section_id'=>9, 'status' =>'1'],

            ];

        foreach ($therapist as $key => $value) {
            Therapist::create($value);
        }
    }
}
