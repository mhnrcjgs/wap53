<?php

namespace App\Console\Commands;

use App\Link;
use Goutte\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SearchKeyWordCommandGthirteen extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:search-thirteen';

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

        Log::info('G 13');

        sleep(4);

        for($i=1; $i<=12; $i++) {

            $text = '';

            Log::info('LOGS: ' . $i);
            $link = Link::where('is_processed', false)->where('group_id', 1)->first();
            $link->is_processed = true;
            $link->save();

            $shortcode = $link->shortcode->shortcode;
            $client = new Client();

            try {

                Log::info('LINK: ' . json_encode(trim($link->link)));

                $crawler = $client->request('GET', trim($link->link));
                $text = strtolower($crawler->text());

            }
            catch (\Exception $e)
            {
                Log::info('ERROR: '.json_encode($e->getMessage()));
            }

            Log::info('STRING TO MATCH: '.json_encode("stop to $shortcode"));

            if (strpos($text, "stop to $shortcode") !== false) {
                Log::info('MATCHED! STOP');
                $link->is_matched = true;
                $link->matched_with = 'stop';
            } else if (strpos($text, "stop all to $shortcode") !== false) {
                Log::info('MATCHED! STOP ALL');
                $link->is_matched = true;
                $link->matched_with = 'stop all';
            } else {
                Log::info('NOT MATCHED!');
            }

            $link->save();

            sleep(5);
        }

    }
}
