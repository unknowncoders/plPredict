<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePredictionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predictions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('fixture_id')->unsigned();
            $table->tinyInteger('home_score')->nullable();
            $table->tinyInteger('away_score')->nullable();
            $table->boolean('boost_up');
            $table->tinyInteger('points');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('fixture_id')->references('id')->on('fixtures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('predictions');
    }
}
