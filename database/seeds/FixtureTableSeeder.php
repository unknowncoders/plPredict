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
                       ["home_club_id"=>1,"away_club_id"=>2,"home_score"=>2,"away_score"=>1,"kickoff"=>"2015-07-11 12:45:00","gameweek_id"=>1], 
                       ["home_club_id"=>3,"away_club_id"=>4,"home_score"=>3,"away_score"=>1,"kickoff"=>"2015-07-11 12:45:00","gameweek_id"=>1], 
                       ["home_club_id"=>5,"away_club_id"=>6,"home_score"=>1,"away_score"=>1,"kickoff"=>"2015-07-11 15:45:00","gameweek_id"=>1], 
                       ["home_club_id"=>1,"away_club_id"=>3,"home_score"=>3,"away_score"=>0,"kickoff"=>"2015-07-28 12:45:00","gameweek_id"=>2], 
                       ["home_club_id"=>2,"away_club_id"=>6,"home_score"=>null,"away_score"=>null,"kickoff"=>"2015-07-30 12:45:00","gameweek_id"=>2], 
                       ["home_club_id"=>5,"away_club_id"=>4,"home_score"=>null,"away_score"=>null,"kickoff"=>"2015-08-01 15:45:00","gameweek_id"=>2], 
                       ["home_club_id"=>4,"away_club_id"=>1,"home_score"=>null,"away_score"=>null,"kickoff"=>"2015-08-03 12:45:00","gameweek_id"=>3], 
                       ["home_club_id"=>3,"away_club_id"=>6,"home_score"=>null,"away_score"=>null,"kickoff"=>"2015-08-03 12:45:00","gameweek_id"=>3], 
                       ["home_club_id"=>5,"away_club_id"=>2,"home_score"=>null,"away_score"=>null,"kickoff"=>"2015-08-03 15:45:00","gameweek_id"=>3], 
                       ["home_club_id"=>6,"away_club_id"=>2,"home_score"=>null,"away_score"=>null,"kickoff"=>"2015-08-08 12:45:00","gameweek_id"=>4], 
                       ["home_club_id"=>4,"away_club_id"=>3,"home_score"=>null,"away_score"=>null,"kickoff"=>"2015-08-08 12:45:00","gameweek_id"=>4], 
                       ["home_club_id"=>1,"away_club_id"=>5,"home_score"=>null,"away_score"=>null,"kickoff"=>"2015-08-08 15:45:00","gameweek_id"=>4], 
                    ]);


    }
}
