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
                        ["name"=>"Arsenal","logo_id"=>5,"fan_pic_id"=>2],
                        ["name"=>"Chelsea","logo_id"=>6,"fan_pic_id"=>3],
                        ["name"=>"Liverpool","logo_id"=>5,"fan_pic_id"=>2],
                        ["name"=>"Manchester City","logo_id"=>6,"fan_pic_id"=>3],
                        ["name"=>"Manchester United","logo_id"=>5,"fan_pic_id"=>2],
                        ["name"=>"Tottenham","logo_id"=>6,"fan_pic_id"=>4],
                    ]);


    }
}
