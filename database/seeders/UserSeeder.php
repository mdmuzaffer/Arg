<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $currentDate = Carbon::now();

        $user = [

            [ 'name' => 'Dr Umasankar', 'email' => 'admin@gmail.com', 'role' => 1, 'password' => bcrypt('123456')],

            ['name'=>'Dr. Sharad', 'email'=>'sharad@gmail.com', 'role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Ankita', 'email'=>'ankita@gmail.com', 'role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr.Promila', 'email'=>'promila@gmail.com', 'role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Arundhati','email' =>'arundhati@gmail.com', 'role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Padmimi', 'email' =>'padmimi@gmail.com', 'role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr.Vidyashree','email' =>'vidyashree@gmail.com', 'role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Shrigowri','email' =>'shrigowri@gmail.com', 'role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr.Reshma', 'email' =>'reshma@gmail.com', 'role'=>2, 'status'=>'1',  'password' => bcrypt('123456')],
            ['name'=>'Dr. Nibedita', 'email' =>'nibedita@gmail.com', 'role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Champa', 'email' =>'champa@gmail.com', 'role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Abhiram', 'email' =>'abhiram@gmail.com', 'role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Roopa', 'email' =>'roopa@gmail.com', 'role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Dhanya','email' =>'dhanya@gmail.com', 'role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Anagha','email' =>'anagha@gmail.com', 'role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Narayan Moss', 'email'=>'narayanmoss@gmail.com', 'role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Ramya R V', 'email'=>'ramyarv@gmail.com','role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Anju', 'email' =>'anju@gmail.com','role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Shriram', 'email' =>'shriram@gmail.com','role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Asharani', 'email'=>'asharani@gmail.com', 'role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Aishwarya', 'email'=>'aishwarya@gmail.com', 'role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Harish Gopal', 'email' =>'harishgopal@gmail.com', 'role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Yashbir',  'email' => 'yashbir@gmail.com','role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Shubharani',  'email' =>'shubharani@gmail.com','role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Mohan',  'email' =>'mohan@gmail.com','role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Keerthi', 'email' =>'keerthi@gmail.com', 'role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Yashashvini', 'email' =>'yashashvini@gmail.com', 'role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Ramyashree',  'email' =>'ramyashree@gmail.com','role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Bhavya',  'email' =>'bhavya@gmail.com','role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Divyashree', 'email' =>'divyashree@gmail.com', 'role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Ranjita', 'email' =>'ranjita@gmail.com', 'role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Swati P S', 'email' =>'swatisp@gmail.com', 'role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Ritesh', 'email' =>'ritesh@gmail.com', 'role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Prasanna', 'email' =>'prasanna@gmail.com', 'role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Swathi B S', 'email' =>'swathibs@gmail.com', 'role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Jincy', 'email' =>'jincy@gmail.com', 'role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Titty', 'email' =>'titty@gmail.com', 'role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Pranab Das', 'email' =>'pranabdas@gmail.com', 'role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Prashant', 'email' =>'prashant@gmail.com', 'role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Dr. Jishnu', 'email' =>'jishnu@gmail.com', 'role'=>2, 'status'=>'1', 'password' => bcrypt('123456')],

            ['name'=>'Akarsh', 'email'=>'akarsh@gmail.com', 'role'=>3, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Anushree', 'email'=>'anushree@gmail.com', 'role'=>3, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Apoorva', 'email'=>'apoorva@gmail.com' , 'role'=>3, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Lavanya', 'email'=>'lavanya@gmail.com', 'role'=>3, 'status'=>'1', 'password' => bcrypt('123456')],

            ['name'=>'Barvesh', 'email'=>'barveshaffiya@gmail.com', 'role'=>3, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Basaw', 'email'=>'basawjyoti@gmail.com', 'role'=>3, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Bhuvanisha', 'email'=>'bhuvanisha@gmail.com', 'role'=>3, 'status'=>'1', 'password' => bcrypt('123456')],
            ['name'=>'Madhura', 'email'=>'madhura@gmail.com', 'role'=>3, 'status'=>'1', 'password' => bcrypt('123456')],

            ['name'=>'Anil', 'email'=>'anil@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Chandana K', 'email'=>'chandanak@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Chandana A', 'email'=>'chandanaa@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Gomathi', 'email'=>'gomathi@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],

            ['name'=>'Suhapriya', 'email'=>'suhapriya@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Abhinaya', 'email'=>'abhinaya@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Sibana', 'email'=>'sibana@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Vishal', 'email'=>'vishal@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],

            ['name'=>'Manasi',  'email'=>'manasi@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Neha', 'email'=>'neha@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Geethanjali', 'email'=>'geethanjali@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Manik', 'email'=>'manik@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],

            ['name'=>'Niharika', 'email'=>'niharika@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Nirupama', 'email'=>'nirupama@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Rushika', 'email'=>'rushika@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Sahana', 'email'=>'sahana@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],

            ['name'=>'Nivedhitha',  'email'=>'nivedhitha@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Payal', 'email'=>'payal@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Yamini', 'email'=>'yamini@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Suprita', 'email'=>'suprita@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],

            ['name'=>'Prarthana', 'email'=>'prarthana@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Rabia', 'email'=>'rabia@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Nidhila', 'email'=>'nidhila@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Vivek', 'email'=>'vivekchand@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],

            ['name'=>'Drishti',  'email'=>'drishti@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Shubra',  'email'=>'shubra@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Ananth',  'email'=>'ananth@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Aishwarya', 'email'=>'aishwaryabr@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],

            ['name'=>'Shushmitha',  'email'=>'shushmitha@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Varshini',  'email'=>'varshini@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Vinay',  'email'=>'vinay@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Raveena',  'email'=>'raveena@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],

            ['name'=>'Yamuna',  'email'=>'yamuna@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Mamatha',  'email'=>'mamatha@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Dharmaraj',  'email'=>'dharmaraj@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Rajeswari',  'email'=>'rajeswari@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],

            ['name'=>'Section A',  'email'=>'sectiona@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Section B',  'email'=>'sectionb@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Section C',  'email'=>'sectionc@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Section D',  'email'=>'sectiond@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Section E',  'email'=>'sectione@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Section F',  'email'=>'sectionf@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Section G',  'email'=>'sectiong@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Section H',  'email'=>'sectionh@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],
            ['name'=>'Section I',  'email'=>'sectioni@gmail.com', 'role'=>3, 'status'=>'1',  'password'=>bcrypt('123456')],

            ['name' => 'Ankit','email' => 'ankit@gmail.com','role' =>4,'password' => bcrypt('123456'),'is_active'=>'1', 'status'=>'0'],
            ['name' => 'Ramesh','email' => 'ramesh@gmail.com','role' =>4,'password' => bcrypt('123456'),'is_active'=>'1', 'status'=>'0'],
            ['name' => 'suraj','email' => 'suraj@gmail.com','role' =>4,'password' => bcrypt('123456'),'is_active'=>'1', 'status'=>'2'],
            ['name' => 'Umesh','email' => 'umesh@gmail.com','role' =>4,'password' => bcrypt('123456'),'is_active'=>'1', 'status'=>'2'],
            ['name' => 'Rohan','email' => 'rohan@gmail.com','role' =>4,'password' => bcrypt('123456'), 'is_active'=>'1', 'status'=>'2'],
            
            ['name' => 'Manoj','email' => 'manoj@gmail.com','role' =>4,'password' => bcrypt('123456'),  'is_active'=>'0', 'status'=>'2'],
            ['name' => 'Dinesh','email' => 'dinesh@gmail.com','role' =>4,'password' => bcrypt('123456'),  'is_active'=>'0', 'status'=>'3'],
            ['name' => 'Rothit','email' => 'rohit@gmail.com','role' =>4,'password' => bcrypt('123456'),  'is_active'=>'0', 'status'=>'3'],

        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
