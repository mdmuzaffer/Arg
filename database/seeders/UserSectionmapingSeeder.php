<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserSectionsMaping;

class UserSectionmapingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usermapingSection = [

            ['section_id' =>1, 'user_id'=>2, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>2, 'user_id'=>3, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>2, 'user_id'=>4, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>2, 'user_id'=>5, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>3, 'user_id'=>6, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>4, 'user_id'=>7, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>5, 'user_id'=>8, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>1, 'user_id'=>9, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>7, 'user_id'=>10, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>1, 'user_id'=>11, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>1, 'user_id'=>12, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>1, 'user_id'=>13, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>1, 'user_id'=>14, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>2, 'user_id'=>15, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>2, 'user_id'=>16, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>2, 'user_id'=>17, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>2, 'user_id'=>18, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>3, 'user_id'=>19, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>3, 'user_id'=>20, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>3, 'user_id'=>21, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>4, 'user_id'=>22, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>4, 'user_id'=>23, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>5, 'user_id'=>24, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>5, 'user_id'=>25, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>5, 'user_id'=>26, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>6, 'user_id'=>27, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>7, 'user_id'=>28, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>8, 'user_id'=>29, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>2, 'user_id'=>30, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>2, 'user_id'=>31, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>2, 'user_id'=>32, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>3, 'user_id'=>33, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>4, 'user_id'=>34, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>4, 'user_id'=>35, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>5, 'user_id'=>36, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>8, 'user_id'=>37, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>9, 'user_id'=>38, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>9, 'user_id'=>39, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>9, 'user_id'=>40, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],


            ['section_id' =>1, 'user_id'=>41, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>1, 'user_id'=>42, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>1, 'user_id'=>43, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>1, 'user_id'=>44, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>1, 'user_id'=>45, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>1, 'user_id'=>46, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>1, 'user_id'=>47, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>1, 'user_id'=>48, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],

            ['section_id' =>2, 'user_id'=>49, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>2, 'user_id'=>50, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>2, 'user_id'=>51, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>2, 'user_id'=>52, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>2, 'user_id'=>53, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>2, 'user_id'=>54, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>2, 'user_id'=>55, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>2, 'user_id'=>56, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],

            ['section_id' =>3, 'user_id'=>57, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>3, 'user_id'=>58, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>3, 'user_id'=>59, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>3, 'user_id'=>60, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],

            ['section_id' =>4, 'user_id'=>61, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>4, 'user_id'=>62, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>4, 'user_id'=>63, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>4, 'user_id'=>64, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],

            ['section_id' =>5, 'user_id'=>65, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>5, 'user_id'=>66, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>5, 'user_id'=>67, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>5, 'user_id'=>68, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],

            ['section_id' =>6, 'user_id'=>69, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>6, 'user_id'=>70, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>6, 'user_id'=>71, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>6, 'user_id'=>72, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],

            ['section_id' =>7, 'user_id'=>73, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>7, 'user_id'=>74, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>7, 'user_id'=>75, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>7, 'user_id'=>76, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],

            ['section_id' =>8, 'user_id'=>77, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>8, 'user_id'=>78, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>8, 'user_id'=>79, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>8, 'user_id'=>80, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],

            ['section_id' =>9, 'user_id'=>81, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>9, 'user_id'=>82, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>9, 'user_id'=>83, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>9, 'user_id'=>84, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],

            ['section_id' =>1, 'user_id'=>85, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>2, 'user_id'=>86, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>3, 'user_id'=>87, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>4, 'user_id'=>88, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>5, 'user_id'=>89, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>6, 'user_id'=>90, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>7, 'user_id'=>91, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>8, 'user_id'=>92, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],
            ['section_id' =>9, 'user_id'=>93, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'1'],

            ['section_id' =>2, 'user_id'=>94, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'0'],
            ['section_id' =>3, 'user_id'=>95, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'0'],
            ['section_id' =>4, 'user_id'=>96, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'2'],
            ['section_id' =>1, 'user_id'=>97, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'2'],
            ['section_id' =>7, 'user_id'=>98, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'2'],
            ['section_id' =>6, 'user_id'=>99, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'2'],
            ['section_id' =>4, 'user_id'=>100, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'2'],
            ['section_id' =>1, 'user_id'=>101, 'approved_by'=>1, 'is_active'=>'1', 'status'=>'2'],
        ];


        foreach ($usermapingSection as $key => $value) {
            UserSectionsMaping::create($value);
        }
    }
}
