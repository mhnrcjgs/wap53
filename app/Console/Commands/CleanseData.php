<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CleanseData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:cleanse';

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
        $phones = \App\Directory::where('is_processed', 0)->take(50000)->get();
        if (count($phones))
        {
            foreach($phones as $phone)
            {
                $phone->phone_1_clean = $this->cleanData($phone->phone_1);
                $phone->phone_2_clean = $this->cleanData($phone->phone_2);
                $phone->phone_3_clean = $this->cleanData($phone->phone_3);
                $phone->phone_4_clean = $this->cleanData($phone->phone_4);
                $phone->is_processed = 1;
                $phone->save();
            }
        }
    }

    private function cleanData($phone)
    {
        $phone = preg_replace("/[^0-9]/", "", $phone);
        if (strlen(trim($phone))>0)
        {
            if ($phone[0] == "0")
            {
                $phone = substr($phone, 1);
                $phone = '44'.$phone;
            };
            return $phone;
        };
        return '';
    }
}
