<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\PaymentDetail;

class PaymentDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $therapy = [

             ['payment_detail_name' =>'First Week Single Yoga Therapy', 'price'=>12000.00, 'department_id'=>0, 'status'=>'1'],
             ['payment_detail_name' =>'Single Bed Room Yoga Therapy', 'price'=>11000.00, 'department_id'=>0, 'status'=>'1'],
             ['payment_detail_name' =>'Double Bed Room Yoga Therapy', 'price'=>10000.00, 'department_id'=>0, 'status'=>'1'],
             ['payment_detail_name' =>'Double Bed Room Yoga Therapy', 'price'=>9000.00, 'department_id'=>0, 'status'=>'1'],
             ['payment_detail_name' =>'First week Deluxe Yoga Therapy', 'price'=>25000.00, 'department_id'=>0, 'status'=>'1'],
             ['payment_detail_name' =>'Single Deluxe Yoga Therapy', 'price'=>24000.00, 'department_id'=>0, 'status'=>'1'],
             ['payment_detail_name' =>'First week Deluxe Double Yoga Therapy', 'price'=>20000.00, 'department_id'=>0, 'status'=>'1'],
             ['payment_detail_name' =>'Double Deluxe Yoga Therapy', 'price'=>19000.00, 'department_id'=>0, 'status'=>'1'],
             ['payment_detail_name' =>'Dormitory Yoga Therapy', 'price'=>6000.00, 'department_id'=>0, 'status'=>'1'],
             ['payment_detail_name' =>'Dormitory Yoga Therapy', 'price'=>5000.00, 'department_id'=>0, 'status'=>'1'],
             ['payment_detail_name' =>'Suite Yoga Therapy', 'price'=>28000.00, 'department_id'=>0, 'status'=>'1'],
             ['payment_detail_name' =>'Suite Sharing Yoga Therapy', 'price'=>27000.00, 'department_id'=>0, 'status'=>'1'],
             ['payment_detail_name' =>'Ayurveda Category 1', 'price'=>3000.00, 'department_id'=>0, 'status'=>'1'],
             ['payment_detail_name' =>'Ayurveda Category 1', 'price'=>5000.00, 'department_id'=>0, 'status'=>'1'],
             ['payment_detail_name' =>'Ayurveda', 'price'=>250.00, 'department_id'=>0, 'status'=>'1'],
             ['payment_detail_name' =>'Ayurveda', 'price'=>500.00, 'department_id'=>0, 'status'=>'1'],
             ['payment_detail_name' =>'Ayurveda', 'price'=>750.00, 'department_id'=>0, 'status'=>'1'],
             ['payment_detail_name' =>'Ayurveda', 'price'=>1000.00, 'department_id'=>0, 'status'=>'1'],
             ['payment_detail_name' =>'Naturopathy Category 1', 'price'=>3000.00, 'department_id'=>0, 'status'=>'1'],
             ['payment_detail_name' =>'Naturopathy Category 2', 'price'=>5000.00, 'department_id'=>0, 'status'=>'1'],
             ['payment_detail_name' =>'Naturopathy', 'price'=>50.00, 'department_id'=>0, 'status'=>'1'],
             ['payment_detail_name' =>'Naturopathy', 'price'=>100.00, 'department_id'=>0, 'status'=>'1'],
             ['payment_detail_name' =>'Naturopathy', 'price'=>150.00, 'department_id'=>0, 'status'=>'1'],
             ['payment_detail_name' =>'Naturopathy', 'price'=>500.00, 'department_id'=>0, 'status'=>'1'],
             ['payment_detail_name' =>'Naturopathy', 'price'=>1000.00, 'department_id'=>0, 'status'=>'1'],
             ['payment_detail_name' =>'Physiotherapy Category 1', 'price'=>1000.00, 'department_id'=>0, 'status'=>'1'],
             ['payment_detail_name' =>'Physiotherapy Category 2', 'price'=>2000.00, 'department_id'=>0, 'status'=>'1'],
             ['payment_detail_name' =>'Acupuncture Category 1', 'price'=>1000.00, 'department_id'=>0, 'status'=>'1'],
             ['payment_detail_name' =>'Acupuncture Category 2', 'price'=>2000.00, 'department_id'=>0, 'status'=>'1'],
         ];


        foreach ($therapy as $key => $value) {
            PaymentDetail::create($value);
        }
    }
}
