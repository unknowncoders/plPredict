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
                        ['month_id'=>7,'user_id'=>1,'rank'=>1], //23 with 1 grade 3
                        ['month_id'=>7,'user_id'=>2,'rank'=>2], //23 with no grade 3
                        ['month_id'=>7,'user_id'=>3,'rank'=>3], //14
                        ['month_id'=>7,'user_id'=>4,'rank'=>4], //10
                    ]);
 
    }
}
