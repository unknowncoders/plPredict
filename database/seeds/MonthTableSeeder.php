<?php

use Illuminate\Database\Seeder;

class MonthTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('months')->delete();

            DB::table('months')->insert([
                        ["name"=>"January"],
                        ["name"=>"February"],
                        ["name"=>"March"],
                        ["name"=>"April"],
                        ["name"=>"May"],
                        ["name"=>"June"],
                        ["name"=>"July"],
                        ["name"=>"August"],
                        ["name"=>"September"],
                        ["name"=>"October"],
                        ["name"=>"November"],
                        ["name"=>"December"],
                    ]);


    }
}
