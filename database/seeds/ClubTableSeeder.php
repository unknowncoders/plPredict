<?php

use Illuminate\Database\Seeder;

class ClubTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('clubs')->delete();

            DB::table('clubs')->insert([
                        ["name"=>"Arsenal","pic_id"=>1],
                        ["name"=>"Chelsea","pic_id"=>2],
                        ["name"=>"Liverpool","pic_id"=>1],
                        ["name"=>"Manchester City","pic_id"=>1],
                        ["name"=>"Manchester United","pic_id"=>1],
                        ["name"=>"Tottenham","pic_id"=>3],
                    ]);


    }
}
