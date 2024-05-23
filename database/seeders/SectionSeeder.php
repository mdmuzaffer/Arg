<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $section = [
            ['name' => 'Section A-Neurology & Oncology', 'description'=>'Neurology & Oncology', 'order'=>1, 'icon'=>'/images/icone/icon.png', 'status' =>'1'],
            //['name' => 'Section A-Oncology', 'description'=>'Oncology', 'order'=>1, 'icon'=>'/images/icone/icon.png', 'status' =>'1'],
            ['name' => 'Section B-Pulmonology & Cardilogy', 'description'=>'Pulmonology & Cardilogy', 'order'=>1, 'icon'=>'/images/icone/icon.png', 'status' =>'1'],
            //['name' => 'Section B-Cardilogy', 'description'=>'Cardilogy', 'order'=>1, 'icon'=>'/images/icone/icon.png', 'status' =>'1'],
            ['name' => 'Section C-Psychiatry', 'description'=>'Physiotherapy', 'order'=>1, 'icon'=>'/images/icone/icon.png', 'status' =>'1'],
            ['name' => 'Section D-Rheumatology', 'description'=>'Rheumatology', 'order'=>1, 'icon'=>'/images/icone/icon.png', 'status' =>'1'],
            ['name' => 'Section E-Spinal Disorders', 'description'=>'Spinal Disorders', 'order'=>1, 'icon'=>'/images/icone/icon.png', 'status' =>'1'],
            ['name' => 'Section F-Metabolic Disorders', 'description'=>'Metabolic Disorders', 'order'=>1, 'icon'=>'/images/icone/icon.png', 'status' =>'1'],
            ['name' => 'Section G-Gastroenterology', 'description'=>'Gastroenterology', 'order'=>1, 'icon'=>'/images/icone/icon.png', 'status' =>'1'],
            ['name' => ' Section H-Endocrinology', 'description'=>'Endocrinology', 'order'=>1, 'icon'=>'/images/icone/icon.png', 'status' =>'1'],

            ['name' => ' Section PPH-Promotion Of Positive Health', 'description'=>'Physiotherapy', 'order'=>1, 'icon'=>'/images/icone/icon.png', 'status' =>'1'],
             ['name' => 'Naturopathy', 'description'=>'Naturopathy', 'order'=>1, 'icon'=>'/images/icone/icon.png', 'status' =>'1'],
             ['name' => 'Ayurveda', 'description'=>'Ayurveda', 'order'=>1, 'icon'=>'/images/icone/icon.png', 'status' =>'1'],
             ['name' => 'Physiotherapy & Acupuncture', 'description'=>'Physiotherapy & Acupuncture', 'order'=>1, 'icon'=>'/images/icone/icon.png', 'status' =>'1'],
        ];


        foreach ($section as $key => $value) {
            Section::create($value);
        }

    }
}
