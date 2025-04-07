<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\CreateAdminUser;

class Kernel extends ConsoleKernel
{
    /**
     * Register the commands for the application.
     */
    protected $commands = [
        CreateAdminUser::class,
    ];
    
    protected function schedule(Schedule $schedule): void
    {
        //
    }

    protected function commands(): void
    {
        // ✅ Obavezno ovo
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
