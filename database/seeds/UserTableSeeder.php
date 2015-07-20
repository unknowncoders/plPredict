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
                         'email'=>'onepiece@gmail.com',
                         'username'=>'imminent',
                         'password'=>Hash::make('something'),
                         'status'=>2,
                         'provider'=>'facebook',
                         'provider_id'=>'1028607243830670',
                         'club_id'=>2,
                         'pic_id'=>1,
                         'score'=>0,
                        ],
                        ['name'=>'Mahendra Thapa',
                         'email'=>'crazyrider@gmail.com',
                         'username'=>'crazyguy',
                         'password'=>Hash::make('anything'),
                         'status'=>2,
                         'provider'=>'facebook',
                         'provider_id'=>'1028607243830660',
                         'club_id'=>5,
                         'pic_id'=>1,
                         'score'=>0,
                        ],
                        ['name'=>'Himal Gurung',
                         'email'=>'grg@gmail.com',
                         'username'=>'unitedboy',
                         'password'=>Hash::make('randomstr'),
                         'status'=>1,
                         'provider'=>'facebook',
                         'provider_id'=>'1028607243830650',
                         'club_id'=>5,
                         'pic_id'=>1,
                         'score'=>0,
                        ],
                    ]);


    }
}
