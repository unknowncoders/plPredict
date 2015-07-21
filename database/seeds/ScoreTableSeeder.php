<?php

use Illuminate\Database\Seeder;

class ScoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('scores')->delete();

            DB::table('scores')->insert([
                        ["val"=>14,"user_id"=>1,"gameweek_id"=>1],
                        ["val"=>18,"user_id"=>2,"gameweek_id"=>1],
                        ["val"=>12,"user_id"=>3,"gameweek_id"=>1],
                    ]);


    }
}
