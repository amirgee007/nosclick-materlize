<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //

        '\App\Console\Commands\GiveInvestInterestToUsers',
        '\App\Console\Commands\AutoPpcLinksResetCommand',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->command('AutoPpcLinksResetCommand')
                  ->dailyAt('00:00');

        $schedule->command('GiveInvestInterestToUsers:cronlabinterest')->everyMinute();
     //   $schedule->command('ResetAppData:resetcronlab')->everyThirtyMinutes();


    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
