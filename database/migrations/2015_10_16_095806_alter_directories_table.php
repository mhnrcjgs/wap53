<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDirectoriesTable extends Migration
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
            $table->string('phone_1_clean');
            $table->string('phone_2_clean');
            $table->string('phone_3_clean');
            $table->string('phone_4_clean');
            $table->integer('is_processed')->default(0);
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
        Schema::table('directories', function ($table) {
            $table->dropColumn('phone_1_clean');
            $table->dropColumn('phone_2_clean');
            $table->dropColumn('phone_3_clean');
            $table->dropColumn('phone_4_clean');
            $table->dropColumn('is_processed');
        });
    }
}
