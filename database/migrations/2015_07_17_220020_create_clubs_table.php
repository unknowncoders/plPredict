<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('logo_id')->unsigned();
            $table->integer('fan_pic_id')->unsigned();
            $table->timestamps();

            $table->foreign('logo_id')->references('id')->on('pics');
            $table->foreign('fan_pic_id')->references('id')->on('pics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clubs');
    }
}
