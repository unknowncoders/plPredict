<?php

use Illuminate\Database\Seeder;

class GameweekTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('gameweeks')->delete();

            DB::table('gameweeks')->insert([
                        ["month_id"=>7,"complete"=>''],
                        ["month_id"=>8,"complete"=>''],
                        ["month_id"=>8,"complete"=>''],
                        ["month_id"=>8,"complete"=>''],
                    ]);


    }
}
