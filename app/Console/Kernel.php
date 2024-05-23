<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */

    protected $commands = [
                Commands\DischargePatient::class,
            ];

    protected function schedule(Schedule $schedule): void
    {
        //$schedule->command('inspire')->hourly();
        //$schedule->command('patients:discharge')->everyMinute();
        $schedule->command('patients:discharge')->everySixHours($minutes = 0);
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
