<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('admins')->delete();

            DB::table('admins')->insert([
                    ['user_id'=>1],
                    ['user_id'=>2],
                    ]);

    }
}
