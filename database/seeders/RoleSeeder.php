<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $role = [
            ['role_name' => 'Admin', 'status' => 1],
            ['role_name' => 'Doctor', 'status' => 1],
            ['role_name' => 'Intern', 'status' => 1],
            ['role_name' => 'Patient', 'status' => 1],
        ];

         foreach ($role as $key => $value) {
            Role::create($value);
        }
    }
}
