<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DietItem;
class DietGroupItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dietchartItems = [

            ['diet_group_id' =>1,  'name'=>'Normal Diet', 'description'=>'Normal Diet', 'icone'=>'', 'status' => 1],
            ['diet_group_id' =>1,  'name'=>'Kichidi', 'description'=>'Kichidi', 'icone'=>'', 'status' => 1],
            ['diet_group_id' =>1,  'name'=>'Fruits', 'description'=>'Fruits', 'icone'=>'', 'status' => 1],
            ['diet_group_id' =>1,  'name'=>'Boiled Vegetable', 'description'=>'Boiled Vegetable', 'icone'=>'', 'status' => 1],
            ['diet_group_id' =>1,  'name'=>'Rava/ Rice ganji', 'description'=>'Rava/ Rice ganji', 'icone'=>'', 'status' => 1],
            ['diet_group_id' =>1,  'name'=>'Others', 'description'=>'Others', 'icone'=>'', 'status' => 1],
            ['diet_group_id' =>2,  'name'=>'Ash Gourd Juice', 'description'=>'Ash Gourd Juice', 'icone'=>'', 'status' => 1],
            ['diet_group_id' =>2,  'name'=>'Sprouts Juice', 'description'=>'Sprouts Juice', 'icone'=>'', 'status' => 1],
            ['diet_group_id' =>2,  'name'=>'Barley Water', 'description'=>'Barley Water', 'icone'=>'', 'status' => 1],
            ['diet_group_id' =>2,  'name'=>'Carrot Juice', 'description'=>'Carrot Juice', 'icone'=>'', 'status' => 1],
            ['diet_group_id' =>2,  'name'=>'Bitter gourd Juice', 'description'=>'Bitter gourd Juice', 'icone'=>'', 'status' => 1],
            ['diet_group_id' =>2,  'name'=>'Lemon Honey Juice', 'description'=>'Lemon Honey Juice', 'icone'=>'', 'status' => 1],
            ['diet_group_id' =>2,  'name'=>'Cucumber Juice', 'description'=>'Cucumber Juice', 'icone'=>'', 'status' => 1],
            ['diet_group_id' =>2,  'name'=>'Beetroot Juice', 'description'=>'Beetroot Juice', 'icone'=>'', 'status' => 1],
            ['diet_group_id' =>2,  'name'=>'Watermelon', 'description'=>'Watermelon', 'icone'=>'', 'status' => 1],
            ['diet_group_id' =>2,  'name'=>'Papaya', 'description'=>'Papaya', 'icone'=>'', 'status' => 1],
            ['diet_group_id' =>2,  'name'=>'Plantain Pith Juice', 'description'=>'Plantain Pith Juice', 'icone'=>'', 'status' => 1],
            ['diet_group_id' =>2,  'name'=>'Boiled Apple', 'description'=>'Boiled Apple', 'icone'=>'', 'status' => 1],
            ['diet_group_id' =>2,  'name'=>'Others', 'description'=>'Others', 'icone'=>'', 'status' => 1],
            ['diet_group_id' =>3,  'name'=>'Boiled Diet +Boiled Vegetable+Butter milk +Fruits', 'description'=>'Boiled Diet +Boiled Vegetable+Butter milk +Fruits', 'icone'=>'', 'status' => 1],
            ['diet_group_id' =>3,  'name'=>'Raw Diet + Butter Milk', 'description'=>' Raw Diet + Butter Milk', 'icone'=>'', 'status' => 1],
            ['diet_group_id' =>3,  'name'=>'Rava or Raice ganji', 'description'=>'Rava or Raice ganji', 'icone'=>'', 'status' => 1],
            ['diet_group_id' =>3,  'name'=>'Kichidi', 'description'=>'Kichidi', 'icone'=>'', 'status' => 1],
            ['diet_group_id' =>3,  'name'=>'Others', 'description'=>'Others', 'icone'=>'', 'status' => 1],
            ['diet_group_id' =>4,  'name'=>'Barley water', 'description'=>'Barley water', 'icone'=>'', 'status' => 1],
            ['diet_group_id' =>4,  'name'=>'Veg Soup', 'description'=>'Veg Soup', 'icone'=>'', 'status' => 1],
            ['diet_group_id' =>4,  'name'=>'Kashayam', 'description'=>'Kashayam', 'icone'=>'', 'status' => 1],
            ['diet_group_id' =>5,  'name'=>'Boiled Diet+Boiled Vegetable+Butter Milk+Fruits', 'description'=>'Boiled Diet+Boiled Vegetable+Butter Milk+Fruits', 'icone'=>'', 'status' => 1],
            ['diet_group_id' =>5,  'name'=>'Raw Diet + Butter Milk', 'description'=>' Raw Diet + Butter Milk', 'icone'=>'', 'status' => 1],
            ['diet_group_id' =>5,  'name'=>'Rava/ Rice ganji', 'description'=>'Rava/ Rice ganji', 'icone'=>'', 'status' => 1],
            ['diet_group_id' =>5,  'name'=>'Kichidi', 'description'=>'Kichidi', 'icone'=>'', 'status' => 1],
            ['diet_group_id' =>5,  'name'=>'Others', 'description'=>'Others', 'icone'=>'', 'status' => 1],

            ];

        foreach ($dietchartItems as $key => $value) {
            DietItem::create($value);
        }
    }
}
