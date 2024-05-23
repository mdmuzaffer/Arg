<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Accommodation;

class AccommodationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accommodation = [
            ['name' => 'Ashirwad', 'description'=>'', 'status' =>'1'],
            ['name' => 'Astha', 'description'=>'', 'status' =>'1'],
            ['name' => 'Ashwini', 'description'=>'', 'status' =>'1'],
            ['name' => 'Dhriti', 'description'=>'', 'status' =>'1'],
            ['name' => 'Krishna villa', 'description'=>'', 'status' =>'1'],
            ['name' => 'Maitri', 'description'=>'', 'status' =>'1'],
            ['name' => 'Medha', 'description'=>'', 'status' =>'1'],
            ['name' => 'Pushpa', 'description'=>'', 'status' =>'1'],
            ['name' => 'Prema', 'description'=>'', 'status' =>'1'],
            ['name' => 'Shradda', 'description'=>'', 'status' =>'1'],
            ['name' => 'Sheshadri Bhavan', 'description'=>'', 'status' =>'1'],
            ['name' => 'Vatika', 'description'=>'', 'status' =>'1'],
        ];

         foreach ($accommodation as $key => $value) {
            Accommodation::create($value);
        }
    }
}
