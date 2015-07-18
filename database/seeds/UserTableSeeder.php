<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('users')->delete();

            DB::table('users')->insert([
                        ['name'=>'Bijay Gurung',
                         'username'=>'imminent',
                         'email'=>'bjgurung10@gmail.com',
                         'club_id'=>1,
                         'password'=>Hash::make('something'),
                         'score'=>0,
                         'pic_id'=>1,
                        ],
                        ['name'=>'Mahendra Thapa',
                         'username'=>'crazyguy',
                         'email'=>'crazyrider@gmail.com',
                         'club_id'=>5,
                         'password'=>Hash::make('anything'),
                         'score'=>0,
                         'pic_id'=>1,
                        ],
                    ]);


    }
}
