<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterIndexTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('directories', function($table)
        {
            $table->index('phone_1_clean');
            $table->index('phone_2_clean');
            $table->index('phone_3_clean');
            $table->index('phone_4_clean');
        });

        Schema::table('cvs_numbers', function($table)
        {
            $table->index('number_clean');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('directories', function($table)
        {
            $table->dropIndex('directories_phone_1_clean_index');
            $table->dropIndex('directories_phone_2_clean_index');
            $table->dropIndex('directories_phone_3_clean_index');
            $table->dropIndex('directories_phone_4_clean_index');
        });

        Schema::table('cvs_numbers', function($table)
        {
            $table->dropIndex('cvs_numbers_number_clean_index');
        });
    }
}
