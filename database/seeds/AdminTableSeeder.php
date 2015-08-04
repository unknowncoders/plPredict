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
                    ['user_id'=>1,'created_at'=>\Carbon\Carbon::now()],
                    ['user_id'=>2,'created_at'=>\Carbon\Carbon::now()],
                    ]);

    }
}
