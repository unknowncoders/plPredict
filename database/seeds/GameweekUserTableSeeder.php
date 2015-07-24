<?php

use Illuminate\Database\Seeder;

class GameweekUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('gameweek_user')->delete();

            //Score system
            //[2,6,10] for draws
            //[2,5,7,10] for other results

            DB::table('gameweek_user')->insert([
                        ['gameweek_id'=>1,'user_id'=>1,'boost_pid'=>3,'score'=>13,'rank'=>2],
                        ['gameweek_id'=>2,'user_id'=>1,'boost_pid'=>4,'score'=>10,'rank'=>1],

                        ['gameweek_id'=>1,'user_id'=>2,'boost_pid'=>6,'score'=>18,'rank'=>1],
                        ['gameweek_id'=>2,'user_id'=>2,'boost_pid'=>null,'score'=>5,'rank'=>3],

                        ['gameweek_id'=>1,'user_id'=>3,'boost_pid'=>10,'score'=>12,'rank'=>3],
                        ['gameweek_id'=>2,'user_id'=>3,'boost_pid'=>null,'score'=>2,'rank'=>4],

                        ['gameweek_id'=>2,'user_id'=>4,'boost_pid'=>13,'score'=>10,'rank'=>2],

                    ]);
    }
}
