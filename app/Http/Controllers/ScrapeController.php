<?php

namespace App\Http\Controllers;

use App\Console\Commands\Directory;
use App\Direcotry;
use App\KeyWord;
use Goutte\Client;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ScrapeController extends Controller
{


    public function directory()
    {
        $directories = \App\Directory::paginate(50);
        return view('index', compact('directories'));
    }

    public function newDirectory()
    {
        $directories = \App\NewDirectory::paginate(50);
        return view('new_directory', compact('directories'));
    }

    public function cvsNumbers()
    {
        $directories = \App\CvsNumber::paginate(50);
        return view('cvs_number', compact('directories'));
    }

    public function phoneOne()
    {
        $phones = \App\CvsNumber::select('number_clean')
            ->join('directories', 'number_clean', '=', 'phone_1_clean')->paginate(50);
        return view('new', compact('phones'));
    }
    public function phoneTwo()
    {
        $phones = \App\CvsNumber::select('number_clean')
            ->join('directories', 'number_clean', '=', 'phone_2_clean')->paginate(50);
        return view('new', compact('phones'));
    }
    public function phoneThree()
    {
        $phones = \App\CvsNumber::select('number_clean')
            ->join('directories', 'number_clean', '=', 'phone_3_clean')->paginate(50);
        return view('new', compact('phones'));
    }
    public function phoneFour()
    {
        $phones = \App\CvsNumber::select('number_clean')
            ->join('directories', 'number_clean', '=', 'phone_4_clean')->paginate(50);
        return view('new', compact('phones'));
    }
}
