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
            $table->string('username')->unique()->nullable();
            $table->string('password', 60);

            // Can be 0, 1 or 2
            // 0 = registered user but no username, no password
            // 1 = registered user with username, no password
            // 2 = registered user with username and password
            $table->tinyInteger('status')->default(0); 

            $table->string('provider');
            $table->string('provider_id')->unique();
            $table->integer('club_id')->unsigned()->nullable();
            $table->integer('pic_id')->unsigned()->default(1);
            $table->timestamp('last_login')->nullable();
            $table->integer('score')->unsigned()->default(0);

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
