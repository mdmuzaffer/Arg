<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WeeklySchedule;

class weeklyScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $weekSchedules = [
            

    ['day_id'=>1, 'therapy_id'=>180, 'therapy_start_time'=>'09:00:00', 'therapy_end_time'=>'16:30:00', 'status'=>'1', 'department_id'=>6],
    ['day_id'=>1, 'therapy_id'=>112, 'therapy_start_time'=>'16:30:00', 'therapy_end_time'=>'17:00:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>1, 'therapy_id'=>113, 'therapy_start_time'=>'17:00:00', 'therapy_end_time'=>'18:00:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>1, 'therapy_id'=>123, 'therapy_start_time'=>'18:00:00', 'therapy_end_time'=>'18:25:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>1, 'therapy_id'=>125, 'therapy_start_time'=>'18:30:00', 'therapy_end_time'=>'19:30:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>1, 'therapy_id'=>242, 'therapy_start_time'=>'19:30:00', 'therapy_end_time'=>'08:20:00', 'status'=>'1', 'department_id'=>7],
    ['day_id'=>2, 'therapy_id'=>110, 'therapy_start_time'=>'05:20:00', 'therapy_end_time'=>'05:50:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>2, 'therapy_id'=>111, 'therapy_start_time'=>'07:00:00', 'therapy_end_time'=>'08:00:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>2, 'therapy_id'=>240, 'therapy_start_time'=>'08:00:00', 'therapy_end_time'=>'08:50:00', 'status'=>'1', 'department_id'=>7],
    ['day_id'=>2, 'therapy_id'=>114, 'therapy_start_time'=>'10:10:00', 'therapy_end_time'=>'10:50:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>2, 'therapy_id'=>96, 'therapy_start_time'=>'06:00:00', 'therapy_end_time'=>'06:55:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>2, 'therapy_id'=>181, 'therapy_start_time'=>'09:00:00', 'therapy_end_time'=>'10:00:00', 'status'=>'1', 'department_id'=>6],
    ['day_id'=>2, 'therapy_id'=>96, 'therapy_start_time'=>'12:00:00', 'therapy_end_time'=>'13:00:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>2, 'therapy_id'=>96, 'therapy_start_time'=>'16:00:00', 'therapy_end_time'=>'17:00:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>2, 'therapy_id'=>120, 'therapy_start_time'=>'11:00:00', 'therapy_end_time'=>'11:50:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>2, 'therapy_id'=>241, 'therapy_start_time'=>'13:00:00', 'therapy_end_time'=>'14:00:00', 'status'=>'1', 'department_id'=>7],
    ['day_id'=>2, 'therapy_id'=>122, 'therapy_start_time'=>'15:00:00', 'therapy_end_time'=>'15:50:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>2, 'therapy_id'=>234, 'therapy_start_time'=>'17:00:00', 'therapy_end_time'=>'17:10:00', 'status'=>'1', 'department_id'=>7],
    ['day_id'=>2, 'therapy_id'=>182, 'therapy_start_time'=>'17:15:00', 'therapy_end_time'=>'18:00:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>2, 'therapy_id'=>123, 'therapy_start_time'=>'18:00:00', 'therapy_end_time'=>'18:25:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>2, 'therapy_id'=>125, 'therapy_start_time'=>'18:30:00', 'therapy_end_time'=>'19:30:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>2, 'therapy_id'=>242, 'therapy_start_time'=>'19:30:00', 'therapy_end_time'=>'20:20:00', 'status'=>'1', 'department_id'=>7],
    ['day_id'=>3, 'therapy_id'=>110, 'therapy_start_time'=>'05:20:00', 'therapy_end_time'=>'05:50:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>3, 'therapy_id'=>111, 'therapy_start_time'=>'07:00:00', 'therapy_end_time'=>'08:00:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>3, 'therapy_id'=>240, 'therapy_start_time'=>'08:00:00', 'therapy_end_time'=>'08:50:00', 'status'=>'1', 'department_id'=>7],
    ['day_id'=>3, 'therapy_id'=>115, 'therapy_start_time'=>'10:10:00', 'therapy_end_time'=>'10:50:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>3, 'therapy_id'=>96, 'therapy_start_time'=>'06:00:00', 'therapy_end_time'=>'06:55:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>3, 'therapy_id'=>181, 'therapy_start_time'=>'09:00:00', 'therapy_end_time'=>'10:00:00', 'status'=>'1', 'department_id'=>6],
    ['day_id'=>3, 'therapy_id'=>96, 'therapy_start_time'=>'12:00:00', 'therapy_end_time'=>'13:00:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>3, 'therapy_id'=>96, 'therapy_start_time'=>'16:00:00', 'therapy_end_time'=>'17:00:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>3, 'therapy_id'=>120, 'therapy_start_time'=>'11:00:00', 'therapy_end_time'=>'11:50:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>3, 'therapy_id'=>241, 'therapy_start_time'=>'13:00:00', 'therapy_end_time'=>'14:00:00', 'status'=>'1', 'department_id'=>7],
    ['day_id'=>3, 'therapy_id'=>122, 'therapy_start_time'=>'15:00:00', 'therapy_end_time'=>'15:50:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>3, 'therapy_id'=>234, 'therapy_start_time'=>'17:00:00', 'therapy_end_time'=>'17:10:00', 'status'=>'1', 'department_id'=>7],
    ['day_id'=>3, 'therapy_id'=>182, 'therapy_start_time'=>'17:15:00', 'therapy_end_time'=>'18:00:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>3, 'therapy_id'=>123, 'therapy_start_time'=>'18:00:00', 'therapy_end_time'=>'18:25:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>3, 'therapy_id'=>125, 'therapy_start_time'=>'18:30:00', 'therapy_end_time'=>'19:30:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>3, 'therapy_id'=>242, 'therapy_start_time'=>'19:30:00', 'therapy_end_time'=>'20:20:00', 'status'=>'1', 'department_id'=>7],
    ['day_id'=>4, 'therapy_id'=>110, 'therapy_start_time'=>'05:20:00', 'therapy_end_time'=>'05:50:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>4, 'therapy_id'=>111, 'therapy_start_time'=>'07:00:00', 'therapy_end_time'=>'08:00:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>4, 'therapy_id'=>240, 'therapy_start_time'=>'08:00:00', 'therapy_end_time'=>'08:50:00', 'status'=>'1', 'department_id'=>7],
    ['day_id'=>4, 'therapy_id'=>116, 'therapy_start_time'=>'10:10:00', 'therapy_end_time'=>'10:50:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>4, 'therapy_id'=>96, 'therapy_start_time'=>'06:00:00', 'therapy_end_time'=>'06:55:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>4, 'therapy_id'=>181, 'therapy_start_time'=>'09:00:00', 'therapy_end_time'=>'10:00:00', 'status'=>'1', 'department_id'=>6],
    ['day_id'=>4, 'therapy_id'=>96, 'therapy_start_time'=>'12:00:00', 'therapy_end_time'=>'13:00:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>4, 'therapy_id'=>96, 'therapy_start_time'=>'16:00:00', 'therapy_end_time'=>'17:00:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>4, 'therapy_id'=>120, 'therapy_start_time'=>'11:00:00', 'therapy_end_time'=>'11:50:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>4, 'therapy_id'=>241, 'therapy_start_time'=>'13:00:00', 'therapy_end_time'=>'14:00:00', 'status'=>'1', 'department_id'=>7],
    ['day_id'=>4, 'therapy_id'=>122, 'therapy_start_time'=>'15:00:00', 'therapy_end_time'=>'15:50:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>4, 'therapy_id'=>234, 'therapy_start_time'=>'17:00:00', 'therapy_end_time'=>'17:10:00', 'status'=>'1', 'department_id'=>7],
    ['day_id'=>4, 'therapy_id'=>182, 'therapy_start_time'=>'17:15:00', 'therapy_end_time'=>'18:00:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>4, 'therapy_id'=>123, 'therapy_start_time'=>'18:00:00', 'therapy_end_time'=>'18:25:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>4, 'therapy_id'=>125, 'therapy_start_time'=>'18:30:00', 'therapy_end_time'=>'19:30:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>4, 'therapy_id'=>242, 'therapy_start_time'=>'19:30:00', 'therapy_end_time'=>'20:20:00', 'status'=>'1', 'department_id'=>7],
    ['day_id'=>5, 'therapy_id'=>110, 'therapy_start_time'=>'05:20:00', 'therapy_end_time'=>'05:50:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>5, 'therapy_id'=>111, 'therapy_start_time'=>'07:00:00', 'therapy_end_time'=>'08:00:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>5, 'therapy_id'=>240, 'therapy_start_time'=>'08:00:00', 'therapy_end_time'=>'08:50:00', 'status'=>'1', 'department_id'=>7],
    ['day_id'=>5, 'therapy_id'=>117, 'therapy_start_time'=>'10:10:00', 'therapy_end_time'=>'10:50:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>5, 'therapy_id'=>96, 'therapy_start_time'=>'06:00:00', 'therapy_end_time'=>'06:55:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>5, 'therapy_id'=>181, 'therapy_start_time'=>'09:00:00', 'therapy_end_time'=>'10:00:00', 'status'=>'1', 'department_id'=>6],
    ['day_id'=>5, 'therapy_id'=>96, 'therapy_start_time'=>'12:00:00', 'therapy_end_time'=>'13:00:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>5, 'therapy_id'=>96, 'therapy_start_time'=>'16:00:00', 'therapy_end_time'=>'17:00:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>5, 'therapy_id'=>120, 'therapy_start_time'=>'11:00:00', 'therapy_end_time'=>'11:50:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>5, 'therapy_id'=>241, 'therapy_start_time'=>'13:00:00', 'therapy_end_time'=>'14:00:00', 'status'=>'1', 'department_id'=>7],
    ['day_id'=>5, 'therapy_id'=>122, 'therapy_start_time'=>'15:00:00', 'therapy_end_time'=>'15:50:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>5, 'therapy_id'=>234, 'therapy_start_time'=>'17:00:00', 'therapy_end_time'=>'17:10:00', 'status'=>'1', 'department_id'=>7],
    ['day_id'=>5, 'therapy_id'=>182, 'therapy_start_time'=>'17:15:00', 'therapy_end_time'=>'18:00:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>5, 'therapy_id'=>123, 'therapy_start_time'=>'18:00:00', 'therapy_end_time'=>'18:25:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>5, 'therapy_id'=>125, 'therapy_start_time'=>'18:30:00', 'therapy_end_time'=>'19:30:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>5, 'therapy_id'=>242, 'therapy_start_time'=>'19:30:00', 'therapy_end_time'=>'20:20:00', 'status'=>'1', 'department_id'=>7],
    ['day_id'=>6, 'therapy_id'=>110, 'therapy_start_time'=>'05:20:00', 'therapy_end_time'=>'05:50:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>6, 'therapy_id'=>111, 'therapy_start_time'=>'07:00:00', 'therapy_end_time'=>'08:00:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>6, 'therapy_id'=>240, 'therapy_start_time'=>'08:00:00', 'therapy_end_time'=>'08:50:00', 'status'=>'1', 'department_id'=>7],
    ['day_id'=>6, 'therapy_id'=>118, 'therapy_start_time'=>'10:10:00', 'therapy_end_time'=>'10:50:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>6, 'therapy_id'=>96, 'therapy_start_time'=>'06:00:00', 'therapy_end_time'=>'06:55:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>6, 'therapy_id'=>181, 'therapy_start_time'=>'09:00:00', 'therapy_end_time'=>'10:00:00', 'status'=>'1', 'department_id'=>6],
    ['day_id'=>6, 'therapy_id'=>96, 'therapy_start_time'=>'12:00:00', 'therapy_end_time'=>'13:00:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>6, 'therapy_id'=>96, 'therapy_start_time'=>'16:00:00', 'therapy_end_time'=>'17:00:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>6, 'therapy_id'=>120, 'therapy_start_time'=>'11:00:00', 'therapy_end_time'=>'11:50:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>6, 'therapy_id'=>241, 'therapy_start_time'=>'13:00:00', 'therapy_end_time'=>'14:00:00', 'status'=>'1', 'department_id'=>7],
    ['day_id'=>6, 'therapy_id'=>122, 'therapy_start_time'=>'15:00:00', 'therapy_end_time'=>'15:50:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>6, 'therapy_id'=>234, 'therapy_start_time'=>'17:00:00', 'therapy_end_time'=>'17:10:00', 'status'=>'1', 'department_id'=>7],
    ['day_id'=>6, 'therapy_id'=>182, 'therapy_start_time'=>'17:15:00', 'therapy_end_time'=>'18:00:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>6, 'therapy_id'=>123, 'therapy_start_time'=>'18:00:00', 'therapy_end_time'=>'18:25:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>6, 'therapy_id'=>125, 'therapy_start_time'=>'18:30:00', 'therapy_end_time'=>'19:30:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>6, 'therapy_id'=>242, 'therapy_start_time'=>'19:30:00', 'therapy_end_time'=>'20:20:00', 'status'=>'1', 'department_id'=>7],
    ['day_id'=>7, 'therapy_id'=>110, 'therapy_start_time'=>'05:20:00', 'therapy_end_time'=>'05:50:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>7, 'therapy_id'=>111, 'therapy_start_time'=>'07:00:00', 'therapy_end_time'=>'08:00:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>7, 'therapy_id'=>240, 'therapy_start_time'=>'08:00:00', 'therapy_end_time'=>'08:50:00', 'status'=>'1', 'department_id'=>7],
    ['day_id'=>7, 'therapy_id'=>119, 'therapy_start_time'=>'10:10:00', 'therapy_end_time'=>'10:50:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>7, 'therapy_id'=>96, 'therapy_start_time'=>'06:00:00', 'therapy_end_time'=>'06:55:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>7, 'therapy_id'=>181, 'therapy_start_time'=>'09:00:00', 'therapy_end_time'=>'10:00:00', 'status'=>'1', 'department_id'=>6],
    ['day_id'=>7, 'therapy_id'=>96, 'therapy_start_time'=>'12:00:00', 'therapy_end_time'=>'13:00:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>7, 'therapy_id'=>96, 'therapy_start_time'=>'16:00:00', 'therapy_end_time'=>'17:00:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>7, 'therapy_id'=>120, 'therapy_start_time'=>'11:00:00', 'therapy_end_time'=>'11:50:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>7, 'therapy_id'=>241, 'therapy_start_time'=>'13:00:00', 'therapy_end_time'=>'14:00:00', 'status'=>'1', 'department_id'=>7],
    ['day_id'=>7, 'therapy_id'=>122, 'therapy_start_time'=>'15:00:00', 'therapy_end_time'=>'15:50:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>7, 'therapy_id'=>234, 'therapy_start_time'=>'17:00:00', 'therapy_end_time'=>'17:10:00', 'status'=>'1', 'department_id'=>7],
    ['day_id'=>7, 'therapy_id'=>182, 'therapy_start_time'=>'17:15:00', 'therapy_end_time'=>'18:00:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>7, 'therapy_id'=>123, 'therapy_start_time'=>'18:00:00', 'therapy_end_time'=>'18:25:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>7, 'therapy_id'=>125, 'therapy_start_time'=>'18:30:00', 'therapy_end_time'=>'19:30:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>7, 'therapy_id'=>242, 'therapy_start_time'=>'19:30:00', 'therapy_end_time'=>'20:20:00', 'status'=>'1', 'department_id'=>7],
    ['day_id'=>6, 'therapy_id'=>183, 'therapy_start_time'=>'20:30:00', 'therapy_end_time'=>'21:00:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>2, 'therapy_id'=>183, 'therapy_start_time'=>'20:30:00', 'therapy_end_time'=>'21:00:00', 'status'=>'1', 'department_id'=>1],
    ['day_id'=>4, 'therapy_id'=>183, 'therapy_start_time'=>'20:30:00', 'therapy_end_time'=>'21:00:00', 'status'=>'1', 'department_id'=>1],
        ];

        foreach ($weekSchedules as $key => $value) {
            WeeklySchedule::create($value);
        }

    }
}
