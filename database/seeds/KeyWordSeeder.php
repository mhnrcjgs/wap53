<?php

use Illuminate\Database\Seeder;

class KeyWordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $letters = range('a', 'z');

        foreach ($letters as $first) {
            foreach ($letters as $second) {
                \App\KeyWord::create([
                   'key' => "$first$second",
                ]);
            }
        }
    }
}
