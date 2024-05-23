<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PaymenMode;
class PaymentMode extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $paymentMode = [
            ['name' => 'Cash', 'status' =>'1'],
            ['name' => 'Debit cards', 'status' =>'1'],
            ['name' => 'Credit cards', 'status' =>'1'],
            ['name' => 'Mobile payments', 'status' =>'1'],
            ['name' => 'UPI', 'status' =>'1'],
        ];

        foreach ($paymentMode as $key => $value) {
            PaymenMode::create($value);
        }
    }
}
