<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBadgeUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('badge_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('badge_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('gameweek_id')->unsigned();

            $table->timestamps();

            $table->foreign('badge_id')->references('id')->on('badges');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('gameweek_id')->references('id')->on('gameweeks');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('badge_user');
    }
}
