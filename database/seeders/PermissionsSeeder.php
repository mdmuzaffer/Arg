<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['permission_name' => 'Add user', 'permission_slug' => 'add-user', 'created_by' => 1 , 'status' => 1],
            ['permission_name' => 'Update user', 'permission_slug' => 'update-user', 'created_by' => 1 , 'status' => 1],
            ['permission_name' => 'Delete user', 'permission_slug' => 'delete-user', 'created_by' => 1 , 'status' => 1],
            ['permission_name' => 'View user', 'permission_slug' => 'view-user', 'created_by' => 1 , 'status' => 1],
            ['permission_name' => 'Add chart', 'permission_slug' => 'add-chart', 'created_by' => 1 , 'status' => 1],
            ['permission_name' => 'Update chart', 'permission_slug' => 'update-chart', 'created_by' => 1 , 'status' => 1],
            ['permission_name' => 'Delete chart', 'permission_slug' => 'delete-chart', 'created_by' => 1 , 'status' => 1],
            ['permission_name' => 'View chart', 'permission_slug' => 'view-chart', 'created_by' => 1 , 'status' => 1],
        ];

         foreach ($permissions as $key => $value) {
            Permission::create($value);
        }
    }
}
