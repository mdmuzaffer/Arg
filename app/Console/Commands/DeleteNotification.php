<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\UserVisit;
use App\Models\AppNotification;
use App\Models\UserDailychart;
use Carbon\Carbon;
use DB;

class DeleteNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Patient old notification delete';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        \Log::info("Patient notification delete cron is running ... !");

        $patients = User::whereHas('appNotifications', function ($query) {
                $query->where('status', '1');
            })->with('appNotifications')->get();

         foreach ($patients as $key => $patient){
            $visit = $this->checkUserVisite($patient->id);
            $visit = $visit ? "Yes" : "No";
            if($visit =="Yes"){
                AppNotification::where('receiver_id', $patient->id)->delete();
                // Also delete therapy
                UserDailychart::where('patient_id', $patient->id)->delete();
            }
        }

        \Log::info("Patient notification delete command run successfully ... !");
    }

        protected function checkUserVisite($id){
            $userVisite = UserVisit::where('patient_id',$id)->get()->first();
            if($userVisite){
            $currentDateTime = Carbon::now();
            $visiteActiveDate = Carbon::parse($userVisite->date)->startOfDay();
            $currentDateTime = $currentDateTime->startOfDay();
            $daysDifference = $currentDateTime->diffInDays($visiteActiveDate);

            return $daysDifference >= 35 ? true : false;

            }else{
                return false;
            }

            
        }
}
