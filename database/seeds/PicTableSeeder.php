<?php

use Illuminate\Database\Seeder;

class PicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
            DB::table('pics')->delete();

            DB::table('pics')->insert([
                        ["name"=>"red.jpg"],
                        ["name"=>"blue.jpg"],
                        ["name"=>"white.jpg"],
                    ]);


    }
}
