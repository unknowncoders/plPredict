<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFixturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixtures', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('home_club_id')->unsigned();
            $table->integer('away_club_id')->unsigned();
            $table->tinyInteger('home_score')->nullable();
            $table->tinyInteger('away_score')->nullable();
            $table->timestamp('kickoff');
            $table->integer('gameweek_id')->unsigned();
            $table->timestamps();

            $table->foreign('home_club_id')->references('id')->on('clubs');
            $table->foreign('away_club_id')->references('id')->on('clubs');
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
        Schema::drop('fixtures');
    }
}
