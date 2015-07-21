<?php

use Illuminate\Database\Seeder;

class PredictionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('predictions')->drop();

            DB::table('predictions')->insert([
                        ["user_id"=>1,"fixture_id"=>1,"home_score"=>1,"away_score"=>0,"boost_up"=>'',"status"=>3],
                        ["user_id"=>1,"fixture_id"=>2,"home_score"=>1,"away_score"=>1,"boost_up"=>'',"status"=>0],
                        ["user_id"=>1,"fixture_id"=>3,"home_score"=>0,"away_score"=>1,"boost_up"=>true,"status"=>0],
                        ["user_id"=>1,"fixture_id"=>4,"home_score"=>2,"away_score"=>0,"boost_up"=>true,"status"=>''],
                        ["user_id"=>1,"fixture_id"=>5,"home_score"=>1,"away_score"=>3,"boost_up"=>'',"status"=>''],

                        ["user_id"=>2,"fixture_id"=>1,"home_score"=>2,"away_score"=>0,"boost_up"=>true,"status"=>1],
                        ["user_id"=>2,"fixture_id"=>2,"home_score"=>1,"away_score"=>1,"boost_up"=>'',"status"=>0],
                        ["user_id"=>2,"fixture_id"=>3,"home_score"=>2,"away_score"=>2,"boost_up"=>'',"status"=>2],
                        ["user_id"=>2,"fixture_id"=>4,"home_score"=>2,"away_score"=>0,"boost_up"=>'',"status"=>''],

                        ["user_id"=>3,"fixture_id"=>3,"home_score"=>0,"away_score"=>0,"boost_up"=>true,"status"=>2],
                        ["user_id"=>3,"fixture_id"=>4,"home_score"=>1,"away_score"=>2,"boost_up"=>'',"status"=>''],
                        ["user_id"=>3,"fixture_id"=>5,"home_score"=>3,"away_score"=>1,"boost_up"=>'',"status"=>''],

                        ["user_id"=>4,"fixture_id"=>4,"home_score"=>2,"away_score"=>1,"boost_up"=>true,"status"=>''],
                        ["user_id"=>4,"fixture_id"=>5,"home_score"=>3,"away_score"=>2,"boost_up"=>'',"status"=>''],

                    ]);

    }
}
