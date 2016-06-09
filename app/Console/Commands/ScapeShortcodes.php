<?php

namespace App\Console\Commands;

use App\Shortcode;
use Goutte\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ScapeShortcodes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:short-code {page}';

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
        $page = $this->argument('page');
        $client = new Client();
        Log::info('INIT CLIENT');
        $crawler = $client->request('GET', 'http://short-codes.com/codes/browse/60000-64999/100_'.$page);
        Log::info('START CRAWLER');
        $row = 1;
        $crawler->filter('.codes tr')->each(function ($node) use (&$row) {
            Log::info('LOOP THRU TABLE ROWS');
            if ($row > 2)
            {
                $col = 1;

                Log::info(' ');
                Log::info('ROW');

                $available = true;
                $sc = '';

                $node->filter('td')->each(function ($n) use (&$col, &$available, &$sc) {
                    if ($col==2)
                    {
                        $sc = trim($n->text());
                        Log::info('SC: '.json_encode($n->text()));
                    }
                    if ($col>3 && $col<9)
                    {
                        $text = $n->filter('img')->attr('title');
                        Log::info('OUTPUT: '.json_encode($text));
                        if ($text != 'Active')
                        {
                            $available = false;
                        }
                    }
                    if ($col==10)
                    {
                        if ($available)
                        {
                            try {
                                Shortcode::create(['shortcode' => $sc]);
                            } catch (\Exception $e)
                            {
                                Log::info(' ');
                                Log::info('ERROR: '.json_encode($e->getMessage()));
                            }

                        }
                    }
                    $col++;
                });
            }
            $row++;
        });

        $crawler1 = $client->request('GET', 'http://short-codes.com/codes/browse/65000-68999/100_'.$page);
        Log::info('START CRAWLER');
        $row1 = 1;
        $crawler1->filter('.codes tr')->each(function ($node) use (&$row1) {
            Log::info('LOOP THRU TABLE ROWS');
            if ($row1 > 2)
            {
                $col = 1;

                Log::info(' ');
                Log::info('ROW');

                $available = true;
                $sc = '';

                $node->filter('td')->each(function ($n) use (&$col, &$available, &$sc) {
                    if ($col==2)
                    {
                        $sc = trim($n->text());
                        Log::info('SC: '.json_encode($n->text()));
                    }
                    if ($col>3 && $col<9)
                    {
                        $text = $n->filter('img')->attr('title');
                        Log::info('OUTPUT: '.json_encode($text));
                        if ($text != 'Active')
                        {
                            $available = false;
                        }
                    }
                    if ($col==10)
                    {
                        if ($available)
                        {
                            try {
                                Shortcode::create(['shortcode' => $sc]);
                            } catch (\Exception $e)
                            {
                                Log::info(' ');
                                Log::info('ERROR: '.json_encode($e->getMessage()));
                            }

                        }
                    }
                    $col++;
                });
            }
            $row1++;
        });

        $crawler2 = $client->request('GET', 'http://short-codes.com/codes/browse/80000-84999/100_'.$page);
        Log::info('START CRAWLER');
        $row2 = 1;
        $crawler2->filter('.codes tr')->each(function ($node) use (&$row2) {
            Log::info('LOOP THRU TABLE ROWS');
            if ($row2 > 2)
            {
                $col = 1;

                Log::info(' ');
                Log::info('ROW');

                $available = true;
                $sc = '';

                $node->filter('td')->each(function ($n) use (&$col, &$available, &$sc) {
                    if ($col==2)
                    {
                        $sc = trim($n->text());
                        Log::info('SC: '.json_encode($n->text()));
                    }
                    if ($col>3 && $col<9)
                    {
                        $text = $n->filter('img')->attr('title');
                        Log::info('OUTPUT: '.json_encode($text));
                        if ($text != 'Active')
                        {
                            $available = false;
                        }
                    }
                    if ($col==10)
                    {
                        if ($available)
                        {
                            try {
                                Shortcode::create(['shortcode' => $sc]);
                            } catch (\Exception $e)
                            {
                                Log::info(' ');
                                Log::info('ERROR: '.json_encode($e->getMessage()));
                            }

                        }
                    }
                    $col++;
                });
            }
            $row2++;
        });

        Log::info('INIT CLIENT');
        $crawler3 = $client->request('GET', 'http://short-codes.com/codes/browse/85000-88999/100_'.$page);
        Log::info('START CRAWLER');
        $row3 = 1;
        $crawler3->filter('.codes tr')->each(function ($node) use (&$row3) {
            Log::info('LOOP THRU TABLE ROWS');
            if ($row3 > 2)
            {
                $col = 1;

                Log::info(' ');
                Log::info('ROW');

                $available = true;
                $sc = '';

                $node->filter('td')->each(function ($n) use (&$col, &$available, &$sc) {
                    if ($col==2)
                    {
                        $sc = trim($n->text());
                        Log::info('SC: '.json_encode($n->text()));
                    }
                    if ($col>3 && $col<9)
                    {
                        $text = $n->filter('img')->attr('title');
                        Log::info('OUTPUT: '.json_encode($text));
                        if ($text != 'Active')
                        {
                            $available = false;
                        }
                    }
                    if ($col==10)
                    {
                        if ($available)
                        {
                            try {
                                Shortcode::create(['shortcode' => $sc]);
                            } catch (\Exception $e)
                            {
                                Log::info(' ');
                                Log::info('ERROR: '.json_encode($e->getMessage()));
                            }

                        }
                    }
                    $col++;
                });
            }
            $row3++;
        });
    }
}
