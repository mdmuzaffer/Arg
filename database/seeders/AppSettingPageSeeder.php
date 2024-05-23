<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AppSettingPage;
class AppSettingPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $appsettings = [
        
        ['setting_title' =>'Notifications', 'setting_description'=>'Notifications', 'setting_icon'=>'/images/icone/notification-icn.png', 'setting_type'=>'1', 'status' =>'1'],

        // ['setting_title' =>'Face Id', 'setting_description'=>'Face Id', 'setting_icon'=>'/images/icone/Face_id.png', 'setting_type'=>'1', 'status' =>'1'],
        // ['setting_title' =>'Tuch Id', 'setting_description'=>'Tuch Id', 'setting_icon'=>'/images/icone/Touch_id.png', 'setting_type'=>'1', 'status' =>'1'],

        ['setting_title' =>'Privacy', 'setting_description'=>'Ayurveda Nemo enim ipsam voluptatem quia sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Ayurveda Nemo enim ipsam voluptatem quia sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt', 'setting_icon'=>'/images/icone/privacy-icn.png', 'setting_type'=>'2', 'status' =>'1'],
        ['setting_title' =>'About Us', 'setting_description'=>'Ayurveda Nemo enim ipsam voluptatem quia sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Ayurveda Nemo enim ipsam voluptatem quia sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt', 'setting_icon'=>'/images/icone/about-icn.png', 'setting_type'=>'2', 'status' =>'1'],
        ['setting_title' =>'Share app', 'setting_description'=>'Share app', 'setting_icon'=>'/images/icone/share-icn.png', 'setting_type'=>'3', 'status' =>'1'],
        
        ];

        foreach ($appsettings as $key => $value) {
            AppSettingPage::create($value);
        }
    }
}
