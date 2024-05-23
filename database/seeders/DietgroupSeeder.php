<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\DietGroup;
class DietgroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $dietGroup = [
            ['group_name' => 'Breakfast', 'description'=>'', 'venue_id'=>1, 'icone'=>'/images/icone/icon.png', 'status' => 1, 'app_type'=>2, 'start_time'=>'07:00:00', 'end_time'=>'08:00:00','group_key'=>'breakfast'],
            ['group_name' => 'Juices', 'description'=>'', 'venue_id'=>2, 'icone'=>'/images/icone/icon.png', 'status' => 1 , 'app_type'=>2,'start_time'=>'10:00:00', 'end_time'=>'11:00:00','group_key'=>'juices'],
            ['group_name' => 'Lunch', 'description'=>'', 'venue_id'=>3, 'icone'=>'/images/icone/icon.png', 'status' => 1, 'app_type'=>2, 'start_time'=>'13:00:00', 'end_time'=>'14:00:00','group_key'=>'lunch'],
            ['group_name' => 'Snacks', 'description'=>'', 'venue_id'=>1,'icone'=>'/images/icone/icon.png', 'status' => 1, 'app_type'=>2, 'start_time'=>'16:00:00', 'end_time'=>'16:30:00','group_key'=>'snacks'],
            ['group_name' => 'Dinner', 'description'=>'', 'venue_id'=>2, 'icone'=>'/images/icone/icon.png', 'status' => 1, 'app_type'=>2, 'start_time'=>'20:00:00', 'end_time'=>'21:00:00','group_key'=>'dinner'],
        ];

        foreach ($dietGroup as $key => $value) {
            DietGroup::create($value);
        }
    }
}
