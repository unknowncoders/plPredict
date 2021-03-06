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
                         'score'=>0,
                         'rank'=>null,
                        ],
                        ['name'=>'Mahendra Thapa',
                         'email'=>'crazyrider@gmail.com',
                         'username'=>'crazyguy',
                         'password'=>Hash::make('anything'),
                         'status'=>2,
                         'provider'=>'facebook',
                         'provider_id'=>'1028607243830660',
                         'club_id'=>5,
                         'score'=>0,
                         'rank'=>null,
                        ],
                        ['name'=>'Himal Gurung',
                         'email'=>'grg@gmail.com',
                         'username'=>'unitedboy',
                         'password'=>Hash::make('randomstr'),
                         'status'=>1,
                         'provider'=>'facebook',
                         'provider_id'=>'1028607243830650',
                         'club_id'=>5,
                         'score'=>0,
                         'rank'=>null,
                        ],
                        ['name'=>'Naya Manche',
                         'email'=>'newentry@gmail.com',
                         'username'=>'newentry',
                         'password'=>Hash::make('randomstr'),
                         'status'=>1,
                         'provider'=>'facebook',
                         'provider_id'=>'1028607243830250',
                         'club_id'=>5,
                         'score'=>0,
                         'rank'=>null,
                        ],
                        ['name'=>'Aadha manche',
                         'email'=>'incomplete@gmail.com',
                         'username'=>null,
                         'password'=>Hash::make('randomstr'),
                         'status'=>0,
                         'provider'=>'facebook',
                         'provider_id'=>'1028607243830630',
                         'club_id'=>null,
                         'score'=>0,
                         'rank'=>null,
                        ],
                    ]);


    }
}
