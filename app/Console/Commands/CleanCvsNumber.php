<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CleanCvsNumber extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:cleanseCvs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $phones = \App\CvsNumber::where('is_processed', 0)->take(10000)->get();
        if (count($phones))
        {
            foreach($phones as $phone)
            {
                $phone->number_clean = preg_replace("/[^0-9]/", "", $phone->number);
                $phone->is_processed = 1;
                $phone->save();
            }
        }
    }

}
