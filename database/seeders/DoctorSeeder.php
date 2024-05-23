<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Doctor;
class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $doctor = [

        ['user_id'=>2, 'firstname' => 'Dr. Sharad', 'lastname'=>'', 'email'=>'sharad@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0,  'status' =>'1'],
        ['user_id'=>3, 'firstname' => 'Dr. Ankita', 'lastname'=>'', 'email'=>'ankita@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0,  'status' =>'1'],
        ['user_id'=>4, 'firstname' =>'Dr.Promila', 'lastname'=>'', 'email'=>'promila@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        ['user_id'=>5, 'firstname' =>'Dr. Arundhati', 'lastname'=>'', 'email'=>'arundhati@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        ['user_id'=>6, 'firstname' =>'Dr. Padmimi', 'lastname'=>'', 'email'=>'padmimi@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        ['user_id'=>7, 'firstname' =>'Dr.Vidyashree', 'lastname'=>'', 'email'=>'vidyashree@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        ['user_id'=>8, 'firstname' =>'Dr. Shrigowri', 'lastname'=>'', 'email'=>'shrigowri@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        ['user_id'=>9, 'firstname' =>'Dr.Reshma', 'lastname'=>'', 'email'=>'reshma@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        ['user_id'=>10, 'firstname' =>'Dr. Nibedita', 'lastname'=>'', 'email'=>'nibedita@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        ['user_id'=>11, 'firstname' =>'Dr. Champa', 'lastname'=>'', 'email'=>'champa@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        ['user_id'=>12, 'firstname' =>'Dr. Abhiram', 'lastname'=>'', 'email'=>'abhiram@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        ['user_id'=>13, 'firstname' =>'Dr. Roopa', 'lastname'=>'', 'email'=>'roopa@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        ['user_id'=>14, 'firstname' =>'Dr. Dhanya', 'lastname'=>'', 'email'=>'dhanya@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        ['user_id'=>15, 'firstname' =>'Dr. Anagha', 'lastname'=>'', 'email'=>'anagha@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        ['user_id'=>16, 'firstname' =>'Dr. Narayan', 'lastname'=>'Moss', 'email'=>'narayanmoss@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        ['user_id'=>17, 'firstname' =>'Dr. Ramya', 'lastname'=>'R V', 'email'=>'ramyarv@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        ['user_id'=>18, 'firstname' =>'Dr. Anju', 'lastname'=>'', 'email'=>'anju@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        ['user_id'=>19, 'firstname' =>'Dr. Shriram', 'lastname'=>'', 'email'=>'shriram@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        ['user_id'=>20, 'firstname' =>'Dr. Asharani', 'lastname'=>'', 'email'=>'asharani@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        ['user_id'=>21, 'firstname' =>'Dr. Aishwarya', 'lastname'=>'', 'email'=>'aishwarya@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        ['user_id'=>22, 'firstname' =>'Dr.Harish', 'lastname'=>'Gopal', 'email'=>'harishgopal@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        ['user_id'=>23, 'firstname' =>'Dr. Yashbir', 'lastname'=>'', 'email'=>'yashbir@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],

        ['user_id'=>24, 'firstname' =>'Dr. Shubharani', 'lastname'=>'', 'email'=>'shubharani@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        ['user_id'=>25, 'firstname' =>'Dr. Mohan', 'lastname'=>'', 'email'=>'mohan@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        ['user_id'=>26, 'firstname' =>'Dr. Keerthi', 'lastname'=>'', 'email'=>'keerthi@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        ['user_id'=>27, 'firstname' =>'Dr.Yashashvini', 'lastname'=>'', 'email'=>'yashashvini@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        ['user_id'=>28, 'firstname' =>'Dr. Ramyashree', 'lastname'=>'', 'email'=>'ramyashree@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        ['user_id'=>29, 'firstname' =>'Dr.Bhavya', 'lastname'=>'', 'email'=>'bhavya@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0 ,'status' =>'1'],
        ['user_id'=>30, 'firstname' =>'Dr.Divyashree', 'lastname'=>'', 'email'=>'divyashree@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        ['user_id'=>31, 'firstname' =>'Dr. Ranjita', 'lastname'=>'', 'email'=>'ranjita@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        ['user_id'=>32, 'firstname' =>'Dr. Swati', 'lastname'=>'P S', 'email'=>'swatisp@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        ['user_id'=>33, 'firstname' =>'Dr. Ritesh', 'lastname'=>'', 'email'=>'ritesh@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        ['user_id'=>34, 'firstname' =>'Dr. Prasanna', 'lastname'=>'', 'email'=>'prasanna@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        ['user_id'=>35, 'firstname' =>'Dr.Swathi', 'lastname'=>'B S', 'email'=>'swathibs@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        ['user_id'=>36, 'firstname' =>'Dr. Jincy', 'lastname'=>'', 'email'=>'jincy@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        ['user_id'=>37, 'firstname' =>'Dr.Titty', 'lastname'=>'', 'email'=>'titty@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        ['user_id'=>38, 'firstname' =>'Dr. Pranab', 'lastname'=>'Das', 'email'=>'pranabdas@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        ['user_id'=>39, 'firstname' =>'Dr.Prashant ', 'lastname'=>'', 'email'=>'prashant@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0,'status' =>'1'],
        ['user_id'=>40, 'firstname' =>'Dr.Jishnu', 'lastname'=>'', 'email'=>'jishnu@gmail.com', 'mobile_no'=>'', 'is_counseler'=>0, 'status' =>'1'],
        
        ];


        foreach ($doctor as $key => $value) {
            Doctor::create($value);
        }

    }
}
