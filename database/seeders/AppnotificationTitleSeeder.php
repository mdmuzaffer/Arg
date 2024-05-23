<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AppNotificationTitle;
class AppnotificationTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $appnotificationtitle = [
            
            ['notification_type' =>3, 'notification_title'=>'Reminder', 'status' =>'1'],
            ['notification_type' =>4, 'notification_title'=>'Offers', 'status' =>'1'],
            ['notification_type' =>5, 'notification_title'=>'Event', 'status' =>'1'],
        ];

        foreach ($appnotificationtitle as $key => $value) {
            AppNotificationTitle::create($value);
        }
    }
}
