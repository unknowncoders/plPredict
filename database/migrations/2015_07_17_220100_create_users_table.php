<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password', 60);
            $table->integer('club_id')->unsigned();
            $table->integer('pic_id')->unsigned();
            $table->timestamp('last_login')->nullable();
            $table->integer('score')->unsigned()->nullable();

            $table->rememberToken()->nullable();
            $table->timestamps();

            $table->foreign('club_id')->references('id')->on('clubs');
            $table->foreign('pic_id')->references('id')->on('pics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
