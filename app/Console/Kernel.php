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
        \App\Console\Commands\MakeCrudCommand::class,
        \App\Console\Commands\MakeMacroCommand::class,
        \App\Console\Commands\MakeMixinCommand::class,
        \App\Console\Commands\MakeResourceCommand::class,
        \App\Console\Commands\MakeTraitCommand::class,
        \App\Console\Commands\MakeViewComposerCommand::class,
        \App\Console\Commands\SyncPermissions::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Only run factories on local or staging env.
        if (\App::environment(['local', 'staging'])) {
            // Call factories.
            $schedule->command('reset:database')->daily(0, 12);
        }
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
