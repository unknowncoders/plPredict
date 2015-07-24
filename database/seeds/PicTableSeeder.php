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
                        ["path"=>"default.jpg"],
                        ["path"=>"red.jpg"],
                        ["path"=>"blue.jpg"],
                        ["path"=>"white.jpg"],
                        ["path"=>"arsenal.jpg"],
                        ["path"=>"astonvilla.jpg"],
                    ]);


    }
}
