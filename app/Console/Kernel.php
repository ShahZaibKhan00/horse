<?php

namespace App\Console;

use App\Console\Commands\ConvertUnusedTokensToCredits;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('listings:deactivate-old')->dailyAt('00:00')->runInBackground()
        ->withoutOverlapping(); // Har raat thek 12 baje
        $schedule->command(ConvertUnusedTokensToCredits::class)->dailyAt('00:00')->runInBackground()
        ->withoutOverlapping(); // Har raat thek 12 baje
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
