<?php

use Illuminate\Database\Seeder;

class MonthUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('month_user')->delete();

            DB::table('month_user')->insert([
                        ['month_id'=>7,'user_id'=>1,'rank'=>null], 
                        ['month_id'=>7,'user_id'=>2,'rank'=>null], 
                        ['month_id'=>7,'user_id'=>3,'rank'=>null], 
                    ]);
 
    }
}
