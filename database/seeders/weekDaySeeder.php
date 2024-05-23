<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WeekDay;

class weekDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $days = [
            ['day' =>'Tuesday', 'status'=>'1'],
            ['day' =>'Wednesday', 'status'=>'1'],
            ['day' =>'Thursday', 'status'=>'1'],
            ['day' =>'Friday', 'status'=>'1'],
            ['day' =>'Saturday', 'status'=>'1'],
            ['day' =>'Sunday', 'status'=>'1'],
            ['day' =>'Monday', 'status'=>'1'],
        ];

        foreach ($days as $key => $value) {
            WeekDay::create($value);
        }

    }
}
