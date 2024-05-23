<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Venue;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $venues = [


            ['name' => 'Daya,(Section F)', 'department_id' =>1, 'language_id' =>3, 'therapy_id'=>0, 'longitude'=>'76.77746870244451', 'latitude'=>'30.735125027530405', 'status'=>'1'],
            ['name' => 'Gambhira (Section G)','department_id' =>1, 'language_id' =>2, 'therapy_id'=>0, 'longitude'=>'76.71145257449126', 'latitude'=>'30.71187679481849', 'status'=>'1'],
            ['name' => 'Karuna (Section D)','department_id' =>1,'language_id' =>1, 'therapy_id'=>0, 'longitude'=>'76.77589538994967', 'latitude'=>'30.761117190398622', 'status'=>'1'],

            ['name' => 'Surabhi','department_id' =>2,'language_id' =>0, 'therapy_id'=>0, 'longitude'=>'76.61772546692016', 'latitude'=>'30.73283162350087', 'status'=>'1'],
            ['name' => 'Surabhi','department_id' =>3,'language_id' =>0, 'therapy_id'=>0, 'longitude'=>'76.61772546692016', 'latitude'=>'30.73283162350087', 'status'=>'1'],
            ['name' => 'Amrutam','department_id' =>4,'language_id' =>0, 'therapy_id'=>0, 'longitude'=>'76.66167077742969', 'latitude'=>'30.695641050988275', 'status'=>'1'],
            ['name' => 'Amrutam','department_id' =>5,'language_id' =>0, 'therapy_id'=>0, 'longitude'=>'76.66167077742969', 'latitude'=>'30.695641050988275', 'status'=>'1'],

            ['name' => 'Daya,(Section F)', 'department_id' =>6, 'language_id' =>3, 'therapy_id'=>0, 'longitude'=>'76.77746870244451', 'latitude'=>'30.735125027530405', 'status'=>'1'],
            ['name' => 'Gambhira (Section G)','department_id' =>6, 'language_id' =>2, 'therapy_id'=>0, 'longitude'=>'76.71145257449126', 'latitude'=>'30.71187679481849', 'status'=>'1'],
            ['name' => 'Karuna (Section D)','department_id' =>6,'language_id' =>1, 'therapy_id'=>0, 'longitude'=>'76.77589538994967', 'latitude'=>'30.761117190398622', 'status'=>'1'],

            ['name' => 'Annapurna Dining Hall','department_id' =>7,'language_id' =>0, 'therapy_id'=>0, 'longitude'=>'76.78252038133087', 'latitude'=>'30.709810579160344', 'status'=>'1'],
            
            ['name' => 'Shruti Mandir','department_id' =>0,'language_id' =>0, 'therapy_id'=>0, 'longitude'=>'76.80964287766096', 'latitude'=>'30.75201162741615', 'status'=>'1'],
            ['name' => 'Inside the Campus','department_id' =>0,'language_id' =>0, 'therapy_id'=>0, 'longitude'=>'76.80105980920207', 'latitude'=>'30.711286452004064', 'status'=>'1'],


            ['name' => 'Anugraha (Section A)', 'department_id' =>0, 'language_id' =>0, 'therapy_id'=>0, 'section_id'=>'1', 'longitude'=>'', 'latitude'=>'', 'status'=>'1'],
            ['name' => 'Komal (Section B)', 'department_id' =>0, 'language_id' =>0, 'therapy_id'=>0, 'section_id'=>'2', 'longitude'=>'', 'latitude'=>'', 'status'=>'1'],
            ['name' => 'Mamata (Section C)', 'department_id' =>0, 'language_id' =>0, 'therapy_id'=>0, 'section_id'=>'3', 'longitude'=>'', 'latitude'=>'', 'status'=>'1'],
            ['name' => 'Karuna (Section D)', 'department_id' =>0, 'language_id' =>0, 'therapy_id'=>0, 'section_id'=>'4', 'longitude'=>'', 'latitude'=>'', 'status'=>'1'],
            ['name' => 'Bhavana (Section E)', 'department_id' =>0, 'language_id' =>0, 'therapy_id'=>0, 'section_id'=>'5', 'longitude'=>'', 'latitude'=>'', 'status'=>'1'],

            ['name' => 'Daya (Section F)', 'department_id' =>0, 'language_id' =>0, 'therapy_id'=>0, 'section_id'=>'6', 'longitude'=>'', 'latitude'=>'', 'status'=>'1'],
            
            ['name' => 'Gambhira (Section G)', 'department_id' =>0, 'language_id' =>0, 'therapy_id'=>0, 'section_id'=>'7', 'longitude'=>'', 'latitude'=>'', 'status'=>'1'],
            ['name' => 'Oudarya (Section H&PPH)', 'department_id' =>0, 'language_id' =>0, 'therapy_id'=>0, 'section_id'=>'8', 'longitude'=>'', 'latitude'=>'', 'status'=>'1'],

        ];

         foreach ($venues as $key => $value) {
            Venue::create($value);
        }
    }
}
