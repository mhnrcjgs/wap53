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
        $crawler = $client->request('GET', $link->link);
        $text = $crawler->filter('body')->text();

        Log::info('TEXT: '.json_encode($text));

        $link->is_processed = true;
        $link->save();

    }
}
