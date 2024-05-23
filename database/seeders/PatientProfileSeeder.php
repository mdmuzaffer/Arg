<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\PatientProfile;
use Carbon\Carbon;

class PatientProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $patientProfile = [

            ['user_id' =>94, 'full_name'=>'Ankit', 'email' =>'ankitkumar@gmail.com', 'mobile'=>'8845345678', 'whats_no'=>'8845345678', 'language_id'=>2,'accomudation_id'=>2, 'address'=>'Mohali', 'state'=>'Punjab', 'city'=>'mohali', 'address2'=>'phase 5 mohali #1999', 'pincode'=>'160059', 'country_id'=>101, 'age'=>23, 'gender'=>1],

            ['user_id' =>95, 'full_name'=>'Ramesh', 'email' =>'ramesh@gmail.com', 'mobile'=>'8845345665', 'whats_no'=>'8845345665', 'language_id'=>3,'accomudation_id'=>3, 'address'=>'Mohali punjab', 'state'=>'Punjab', 'city'=>'mohali', 'address2'=>'phase 5 mohali #1999', 'pincode'=>'160034', 'country_id'=>101, 'age'=>32, 'gender'=>1],

            ['user_id' =>96, 'full_name'=>'Suraj', 'email' =>'suraj@gmail.com', 'mobile'=>'8845345619', 'whats_no'=>'8845345619', 'language_id'=>1,'accomudation_id'=>2, 'address'=>'Mohali', 'state'=>'Punjab', 'city'=>'mohali', 'address2'=>'phase 5 mohali #1999', 'pincode'=>'160010', 'country_id'=>101, 'age'=>25, 'gender'=>1],

            ['user_id' =>97, 'full_name'=>'Umesh', 'email' =>'umesh@gmail.com', 'mobile'=>'8845345622', 'whats_no'=>'8845345622', 'language_id'=>2,'accomudation_id'=>2, 'address'=>'Mohali', 'state'=>'Punjab', 'city'=>'mohali', 'address2'=>'phase 5 mohali #1999', 'pincode'=>'160059', 'country_id'=>101, 'age'=>23, 'gender'=>1],


            ['user_id' =>98, 'full_name'=>'Rohan', 'email' =>'rohan@gmail.com', 'mobile'=>'8845345644', 'whats_no'=>'8845345644', 'language_id'=>2,'accomudation_id'=>3, 'address'=>'Delhi', 'state'=>'Delhi', 'city'=>'mohali', 'address2'=>'phase 5 mohali #1999', 'pincode'=>'160059', 'country_id'=>101, 'age'=>23, 'gender'=>1],

            ['user_id' =>99, 'full_name'=>'Manoj', 'email' =>'manoj@gmail.com', 'mobile'=>'8845345630', 'whats_no'=>'8845345630', 'language_id'=>1,'accomudation_id'=>2, 'address'=>'Mohali', 'state'=>'Punjab', 'city'=>'mohali', 'address2'=>'phase 5 mohali #1999', 'pincode'=>'160059', 'country_id'=>101, 'age'=>23, 'gender'=>1],


            ['user_id' =>100, 'full_name'=>'Dinesh', 'email' =>'dinesh@gmail.com', 'mobile'=>'8845345615', 'whats_no'=>'8845345615', 'language_id'=>3,'accomudation_id'=>3, 'address'=>'Patna', 'state'=>'Punjab', 'city'=>'mohali', 'address2'=>'phase 5 mohali #1999', 'pincode'=>'854326', 'country_id'=>101, 'age'=>29, 'gender'=>1],

             ['user_id' =>101, 'full_name'=>'Rohit', 'email' =>'rohit@gmail.com', 'mobile'=>'8845345655', 'whats_no'=>'8845345655', 'language_id'=>2,'accomudation_id'=>3, 'address'=>'Lucknow', 'state'=>'Punjab', 'city'=>'mohali', 'address2'=>'phase 5 mohali #1999', 'pincode'=>'160059', 'country_id'=>101, 'age'=>27, 'gender'=>1],

        ];


        foreach ($patientProfile as $key => $value) {
            PatientProfile::create($value);
        }

    }
}


