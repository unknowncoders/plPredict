<?php

use Illuminate\Database\Seeder;

class BadgeUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('badge_user')->delete();

            DB::table('badge_user')->insert([
                        ["badge_id"=>1,"user_id"=>1,"gameweek_id"=>1],
                    ]);
    
    }
}
