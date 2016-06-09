<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewDirectoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_directories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->string('number_clean');
            $table->string('phone_1_clean');
            $table->string('phone_2_clean');
            $table->string('phone_3_clean');
            $table->string('phone_4_clean');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('new_directories');
    }
}
