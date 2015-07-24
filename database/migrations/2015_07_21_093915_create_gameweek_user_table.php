<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameweekUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gameweek_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gameweek_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('boost_pid')->unsigned()->nullable();
            $table->integer('score')->default(0);
            $table->integer('rank')->nullable();

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('gameweek_id')->references('id')->on('gameweeks');
            $table->foreign('boost_pid')->references('id')->on('predictions');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('gameweek_user');
    }
}
