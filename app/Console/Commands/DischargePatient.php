<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;
use DB;

class DischargePatient extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'patients:discharge';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change patient status active to discharge mode automatically';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        
        \Log::info("Patient discharge cron is running ... !");

        $patients = User::whereHas('sections', function($query){
            $query->where('is_active', '1');
        })
        ->where('role', 4)
        ->where('status', '1')
        ->with('sectionMaping')
        ->get()
        ->toArray();
        
        foreach ($patients as $patient){
            $departmentActiveDate = $patient['section_maping']['section_active_date'];
            $currentDateTime = Carbon::now();
            $departmentActiveDate = Carbon::parse($departmentActiveDate)->startOfDay();
            $currentDateTime = $currentDateTime->startOfDay();
            $daysDifference = $currentDateTime->diffInDays($departmentActiveDate);

            if($daysDifference >=7) {
                DB::table('users')->where('id', $patient['id'])->update(['status'=>'3', 'is_active' =>'0']);
            }
        }
        $this->info('patients:discharge Command Run Successfully !');
    }
}
