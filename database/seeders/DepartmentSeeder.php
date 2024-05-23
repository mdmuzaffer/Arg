<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;
class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $department = [
            ['name' => 'Yoga', 'icon'=>'/images/icone/icon.png', 'status' =>'1'],
            ['name' => 'Ayurvedha', 'icon'=>'/images/icone/icon.png', 'status' =>'1'],
            ['name' => 'Naturopathy', 'icon'=>'/images/icone/icon.png', 'status' =>'1'],
            ['name' => 'Physiotheraphy', 'icon'=>'/images/icone/icon.png', 'status' =>'1'],
            ['name' => 'Acupuncture', 'icon'=>'/images/icone/icon.png', 'status' =>'1'],
            ['name' => 'Counseling', 'icon'=>'/images/icone/icon.png', 'status' =>'1'],
            ['name' => 'Diet', 'icon'=>'/images/icone/icon.png', 'status' =>'1'],
        ];

         foreach ($department as $key => $value) {
            Department::create($value);
        }
    }
}


