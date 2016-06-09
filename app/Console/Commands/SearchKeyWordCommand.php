<?php

namespace App\Console\Commands;

use App\Link;
use Goutte\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SearchKeyWordCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:search';

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
        Log::info('LOGS');
        $link = Link::where('is_processed', false)->first();
        $shortcode = $link->shortcode->shortcode;
        $client = new Client();

        Log::info('LINK: '.json_encode(trim($link->link)));

        $crawler = $client->request('GET', trim($link->link));
        $text = $crawler->filter('body')->first()->text();

        if (strpos($text, $shortcode) !== false)
        {
            Log::info('MATCHED!');
        }
        else
        {
            Log::info('NOT MATCHED!');
        }

        $link->is_processed = true;
        $link->save();

    }
}
