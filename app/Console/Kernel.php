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
        \App\Console\Commands\Inspire::class,
        \App\Console\Commands\Directory::class,
        \App\Console\Commands\CleanseData::class,
        \App\Console\Commands\CleanCvsNumber::class,
        \App\Console\Commands\NewDirectory::class,
        \App\Console\Commands\ScapeShortcodes::class,
        \App\Console\Commands\SearchKeyWordCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //$schedule->command('inspire')
        //    ->hourly();
        //$schedule->command('scrape:directory')
        //    ->cron('*/5 * 14-17 * *');
        $schedule->command('scrape:search')
            ->everyMinute();
    }
}
