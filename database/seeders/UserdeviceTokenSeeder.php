<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserDeviceToken;
class UserdeviceTokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $token = [
            ['user_id' =>94, 'device_type'=>'Android', 'device_token'=>'eBjuiJWnQAWnRO4JDilyXm:APA91bH3-8pZ0RrTZNjJvjK9btAl42xhspJL_1rIE-vTetdQDRa7zSqQKnBO5QZ5IQlogZZvn4_t71GXCLwcNIeSXQ5suURnUauBxveQ2pUak3XpQ1aUCm410qhr1CcrwGv7xxvGjDOL', 'version'=>'', 'device_name'=>'Android'],
            ['user_id' =>95, 'device_type'=>'Android', 'device_token'=>'eBjuiJWnQAWnRO4JDilyXm:APA91bH3-8pZ0RrTZNjJvjK9btAl42xhspJL_1rIE-vTetdQDRa7zSqQKnBO5QZ5IQlogZZvn4_t71GXCLwcNIeSXQ5suURnUauBxveQ2pUak3XpQ1aUCm410qhr1CcrwGv7xxvGjDOL', 'version'=>'', 'device_name'=>'Android'],
            ['user_id' =>96, 'device_type'=>'Android', 'device_token'=>'eBjuiJWnQAWnRO4JDilyXm:APA91bH3-8pZ0RrTZNjJvjK9btAl42xhspJL_1rIE-vTetdQDRa7zSqQKnBO5QZ5IQlogZZvn4_t71GXCLwcNIeSXQ5suURnUauBxveQ2pUak3XpQ1aUCm410qhr1CcrwGv7xxvGjDOL', 'version'=>'', 'device_name'=>'Android'],
            ['user_id' =>97, 'device_type'=>'Android', 'device_token'=>'eBjuiJWnQAWnRO4JDilyXm:APA91bH3-8pZ0RrTZNjJvjK9btAl42xhspJL_1rIE-vTetdQDRa7zSqQKnBO5QZ5IQlogZZvn4_t71GXCLwcNIeSXQ5suURnUauBxveQ2pUak3XpQ1aUCm410qhr1CcrwGv7xxvGjDOL', 'version'=>'', 'device_name'=>'Android'],
            ['user_id' =>98, 'device_type'=>'Android', 'device_token'=>'eBjuiJWnQAWnRO4JDilyXm:APA91bH3-8pZ0RrTZNjJvjK9btAl42xhspJL_1rIE-vTetdQDRa7zSqQKnBO5QZ5IQlogZZvn4_t71GXCLwcNIeSXQ5suURnUauBxveQ2pUak3XpQ1aUCm410qhr1CcrwGv7xxvGjDOL', 'version'=>'', 'device_name'=>'Android'],
            ['user_id' =>99, 'device_type'=>'Android', 'device_token'=>'eBjuiJWnQAWnRO4JDilyXm:APA91bH3-8pZ0RrTZNjJvjK9btAl42xhspJL_1rIE-vTetdQDRa7zSqQKnBO5QZ5IQlogZZvn4_t71GXCLwcNIeSXQ5suURnUauBxveQ2pUak3XpQ1aUCm410qhr1CcrwGv7xxvGjDOL', 'version'=>'', 'device_name'=>'Android'],
            ['user_id' =>100, 'device_type'=>'Android', 'device_token'=>'eBjuiJWnQAWnRO4JDilyXm:APA91bH3-8pZ0RrTZNjJvjK9btAl42xhspJL_1rIE-vTetdQDRa7zSqQKnBO5QZ5IQlogZZvn4_t71GXCLwcNIeSXQ5suURnUauBxveQ2pUak3XpQ1aUCm410qhr1CcrwGv7xxvGjDOL', 'version'=>'', 'device_name'=>'Android'],
            ['user_id' =>101, 'device_type'=>'Android', 'device_token'=>'eBjuiJWnQAWnRO4JDilyXm:APA91bH3-8pZ0RrTZNjJvjK9btAl42xhspJL_1rIE-vTetdQDRa7zSqQKnBO5QZ5IQlogZZvn4_t71GXCLwcNIeSXQ5suURnUauBxveQ2pUak3XpQ1aUCm410qhr1CcrwGv7xxvGjDOL', 'version'=>'', 'device_name'=>'Android'],

        ];

        foreach ($token as $key => $value) {
            UserDeviceToken::create($value);
        }
    }
}
