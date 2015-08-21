<?php

use Illuminate\Database\Seeder;

class FixtureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('fixtures')->delete();

            DB::table('fixtures')->insert([
                       ["home_club_id"=>1,"away_club_id"=>2,"home_score"=>2,"away_score"=>1,"kickoff"=>"2015-07-28 12:45:00","gameweek_id"=>1,"over"=>true], 
                       ["home_club_id"=>3,"away_club_id"=>4,"home_score"=>3,"away_score"=>1,"kickoff"=>"2015-07-28 12:45:00","gameweek_id"=>1,"over"=>true], 
                       ["home_club_id"=>5,"away_club_id"=>6,"home_score"=>1,"away_score"=>1,"kickoff"=>"2015-07-28 15:45:00","gameweek_id"=>1,"over"=>true], 
                       ["home_club_id"=>1,"away_club_id"=>3,"home_score"=>3,"away_score"=>0,"kickoff"=>"2015-08-19 12:45:00","gameweek_id"=>2,"over"=>true], 
                       ["home_club_id"=>2,"away_club_id"=>6,"home_score"=>null,"away_score"=>null,"kickoff"=>"2015-08-20 12:45:00","gameweek_id"=>2,"over"=>false], 
                       ["home_club_id"=>5,"away_club_id"=>4,"home_score"=>null,"away_score"=>null,"kickoff"=>"2015-08-22 15:45:00","gameweek_id"=>2,"over"=>false], 
                       ["home_club_id"=>4,"away_club_id"=>1,"home_score"=>null,"away_score"=>null,"kickoff"=>"2015-08-29 12:45:00","gameweek_id"=>3,"over"=>false], 
                       ["home_club_id"=>3,"away_club_id"=>6,"home_score"=>null,"away_score"=>null,"kickoff"=>"2015-08-29 12:45:00","gameweek_id"=>3,"over"=>false], 
                       ["home_club_id"=>5,"away_club_id"=>2,"home_score"=>null,"away_score"=>null,"kickoff"=>"2015-08-29 15:45:00","gameweek_id"=>3,"over"=>false], 
                       ["home_club_id"=>6,"away_club_id"=>2,"home_score"=>null,"away_score"=>null,"kickoff"=>"2015-09-01 12:45:00","gameweek_id"=>4,"over"=>false], 
                       ["home_club_id"=>4,"away_club_id"=>3,"home_score"=>null,"away_score"=>null,"kickoff"=>"2015-09-01 12:45:00","gameweek_id"=>4,"over"=>false], 
                       ["home_club_id"=>1,"away_club_id"=>5,"home_score"=>null,"away_score"=>null,"kickoff"=>"2015-09-02 15:45:00","gameweek_id"=>4,"over"=>false], 
                    ]);


    }
}
