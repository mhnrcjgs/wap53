<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;

class NewDirectory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:newDirectory';

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
        $phone_1 = \App\CvsNumber::select('company_name', 'number_clean', 'phone_1_clean',
            'phone_2_clean', 'phone_3_clean', 'phone_4_clean')
            ->join('directories', 'number_clean', '=', 'phone_1_clean')->get()->toArray();
        $phone_2 = \App\CvsNumber::select('company_name', 'number_clean', 'phone_1_clean',
            'phone_2_clean', 'phone_3_clean', 'phone_4_clean')
            ->join('directories', 'number_clean', '=', 'phone_2_clean')->get()->toArray();
        $phone_3 = \App\CvsNumber::select('company_name', 'number_clean', 'phone_1_clean',
            'phone_2_clean', 'phone_3_clean', 'phone_4_clean')
            ->join('directories', 'number_clean', '=', 'phone_3_clean')->get()->toArray();
        $phone_4 = \App\CvsNumber::select('company_name', 'number_clean', 'phone_1_clean',
            'phone_2_clean', 'phone_3_clean', 'phone_4_clean')
            ->join('directories', 'number_clean', '=', 'phone_4_clean')->get()->toArray();
        $collection = collect(array_merge($phone_1, $phone_2, $phone_3, $phone_4));
        $new_directory = $collection->unique();
        foreach($new_directory->toArray() as $phone)
        {
            \App\NewDirectory::create($phone);
        }
    }
}
