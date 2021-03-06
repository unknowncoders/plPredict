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
         $this->call(PredictionTableSeeder::class);
         $this->call(BadgeTableSeeder::class);
         $this->call(BadgeUserTableSeeder::class);
         $this->call(MonthUserTableSeeder::class);
         $this->call(GameweekUserTableSeeder::class);
         $this->call(AdminTableSeeder::class);

        Model::reguard();
    }
}
