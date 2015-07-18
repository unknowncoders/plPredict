<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameweeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gameweeks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('month_id')->unsigned();
            $table->boolean('status')->default(false);
            $table->timestamps();

            $table->foreign('month_id')->references('id')->on('months');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('gameweeks');
    }
}
