<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\State;
class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $state = [
            ['state_name' => 'ANDHRA PRADESH', 'status' => 1],
            ['state_name' => 'ASSAM', 'status' => 1],
            ['state_name' => 'ARUNACHAL PRADESH', 'status' => 1],
            ['state_name' => 'BIHAR', 'status' => 1],
            ['state_name' => 'GUJRAT', 'status' => 1],
            ['state_name' => 'HARYANA', 'status' => 1],
            ['state_name' => 'HIMACHAL PRADESH', 'status' => 1],
            ['state_name' => 'JAMMU & KASHMIR', 'status' => 1],
            ['state_name' => 'KARNATAKA', 'status' => 1],
            ['state_name' => 'KERALA', 'status' => 1],
            ['state_name' => 'MADHYA PRADESH', 'status' => 1],
            ['state_name' => 'MAHARASHTRA', 'status' => 1],
            ['state_name' => 'MANIPUR', 'status' => 1],
            ['state_name' => 'MEGHALAYA', 'status' => 1],
            ['state_name' => 'MIZORAM', 'status' => 1],
            ['state_name' => 'NAGALAND', 'status' => 1],
            ['state_name' => 'ORISSA', 'status' => 1],
            ['state_name' => 'PUNJAB', 'status' => 1],
            ['state_name' => 'RAJASTHAN', 'status' => 1],
            ['state_name' => 'SIKKIM', 'status' => 1],
            ['state_name' => 'TAMIL NADU', 'status' => 1],
            ['state_name' => 'TRIPURA', 'status' => 1],
            ['state_name' => 'UTTAR PRADESH', 'status' => 1],
            ['state_name' => 'WEST BENGAL', 'status' => 1],
            ['state_name' => 'DELHI', 'status' => 1],
            ['state_name' => 'GOA', 'status' => 1],
            ['state_name' => 'PONDICHERY', 'status' => 1],
            ['state_name' => 'LAKSHDWEEP', 'status' => 1],
            ['state_name' => 'DAMAN & DIU', 'status' => 1],
            ['state_name' => 'DADRA & NAGAR', 'status' => 1],
            ['state_name' => 'CHANDIGARH', 'status' => 1],
            ['state_name' => 'ANDAMAN & NICOBAR', 'status' => 1],
            ['state_name' => 'UTTARANCHAL', 'status' => 1],
            ['state_name' => 'JHARKHAND', 'status' => 1],
            ['state_name' => 'CHATTISGARH', 'status' => 1]
        ];

        foreach ($state as $key => $value) {
            State::create($value);
        }
    }
}
