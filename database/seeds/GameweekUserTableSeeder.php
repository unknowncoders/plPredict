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
                        ['gameweek_id'=>1,'user_id'=>1,'boost_id'=>3,'score'=>0,'rank'=>null],
                        ['gameweek_id'=>2,'user_id'=>1,'boost_id'=>4,'score'=>0,'rank'=>null],

                        ['gameweek_id'=>1,'user_id'=>2,'boost_id'=>1,'score'=>0,'rank'=>null],
                        ['gameweek_id'=>2,'user_id'=>2,'boost_id'=>null,'score'=>0,'rank'=>null],

                        ['gameweek_id'=>1,'user_id'=>3,'boost_id'=>2,'score'=>0,'rank'=>null],
                        ['gameweek_id'=>2,'user_id'=>3,'boost_id'=>null,'score'=>0,'rank'=>null],

                        ['gameweek_id'=>2,'user_id'=>4,'boost_id'=>2,'score'=>0,'rank'=>null],

                    ]);
    }
}
