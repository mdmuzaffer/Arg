<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Group;
class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dietGroup = [
            ['name' => 'Breakfast', 'department_id'=>7,'status'=>'1'],
            ['name' => 'Juices', 'department_id'=>7,'status'=>'1'],
            ['name' => 'Lunch', 'department_id'=>7,'status'=>'1'],
            ['name' => 'Snacks', 'department_id'=>7,'status'=>'1'],
            ['name' => 'Dinner', 'department_id'=>7,'status'=>'1'],
        ];

        foreach ($dietGroup as $key => $value) {
            Group::create($value);
        }
    }
}
