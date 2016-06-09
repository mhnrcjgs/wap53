<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('directory', ['as' => 'directory', 'uses' => 'ScrapeController@directory']);
Route::get('cvs_numbers', ['as' => 'cvs_numbers', 'uses' => 'ScrapeController@cvsNumbers']);
Route::get('new_directory', ['as' => 'new_directory', 'uses' => 'ScrapeController@newDirectory']);
Route::get('phone_1', ['as' => 'phone_1', 'uses' => 'ScrapeController@phoneOne']);
Route::get('phone_2', ['as' => 'phone_2', 'uses' => 'ScrapeController@phoneTwo']);
Route::get('phone_3', ['as' => 'phone_3', 'uses' => 'ScrapeController@phoneThree']);
Route::get('phone_4', ['as' => 'phone_4', 'uses' => 'ScrapeController@phoneFour']);
