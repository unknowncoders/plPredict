<?php

use Illuminate\Database\Seeder;

class BadgeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('badges')->delete();

            DB::table('badges')->insert([
                        ["name"=>"debut","description"=>"Made first prediction","icon_path"=>"debut.jpg"],
                        ["name"=>"On Target","description"=>"Made first correct prediction","icon_path"=>"ontarget.jpg"],
                    ]);
    }
}
