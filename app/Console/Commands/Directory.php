<?php

namespace App\Console\Commands;

use App\KeyWord;
use Goutte\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Directory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:directory';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrape directory data.';

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
        DB::transaction(function() {
            $key = KeyWord::where('is_scraped', '!=', 1)->min('key');
            $client = new Client();
            $crawler = $client->request('GET', 'http://www.saynoto0870.com/search.php');
            $crawler = $crawler->filter('form[name="company_search"]');
            $form = $crawler->selectButton('Search')->form();
            $crawler = $client->submit($form, ['search_name' => $key]);
            $crawler = $crawler->filter('.boardcontainer')->first();
            $row = 1;
            $crawler->filter('tr')->each(function ($node) use (&$row) {
                if ($row > 2)
                {
                    $column = 1;
                    $data = [];
                    $node->filter('.windowbg2')->each(function ($nested_node) use (&$column, &$data) {
                        switch($column)
                        {
                            case 1:
                            {
                                $data['company_name'] = $nested_node->text();
                                break;
                            }
                            case 2:
                            {
                                $data['phone_1'] = $nested_node->text();
                                break;
                            }
                            case 3:
                            {
                                $data['phone_2'] = $nested_node->text();
                                break;
                            }
                            case 4:
                            {
                                $data['phone_3'] = $nested_node->text();
                                break;
                            }
                            case 5:
                            {
                                $data['phone_4'] = $nested_node->text();
                                break;
                            }
                            case 6:
                            {
                                $data['other_info'] = $nested_node->text();
                                break;
                            }
                            default:
                            {
                                break;
                            }
                        }
                        $column++;
                    });
                    \App\Directory::create($data);
                }
                $row++;
            });
            $key_word = KeyWord::where('key', $key)->first();
            $key_word->is_scraped = 1;
            $key_word->save();
        });

    }
}
