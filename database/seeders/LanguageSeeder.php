<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Language;
class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $language = [
            ['name' => 'Kannada', 'shortname' => 'kn', 'language_flag'=>'1', 'description'=>'Karuna (Section D)', 'status' => '1'],
            ['name' => 'Hindi', 'shortname' => 'hi', 'language_flag'=>'2', 'description'=>'Gambhira (Section G)', 'status' => '1'],
            ['name' => 'English', 'shortname' => 'en', 'language_flag'=>'3', 'description'=>'Daya,(Section F)', 'status' => '1'],
        ];

        foreach ($language as $key => $value) {
            Language::create($value);
        }
    }
}
