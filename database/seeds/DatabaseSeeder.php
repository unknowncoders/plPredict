<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         $this->call(PicTableSeeder::class);
         $this->call(ClubTableSeeder::class);
         $this->call(UserTableSeeder::class);
         $this->call(MonthTableSeeder::class);
         $this->call(GameweekTableSeeder::class);
         $this->call(FixtureTableSeeder::class);

        Model::reguard();
    }
}
