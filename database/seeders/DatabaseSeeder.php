<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call(CommunitiesSeeder::class);
       $this->call(ProvinceSeeder::class);
       $this->call(UserSeeder::class);
       $this->call(AnnounceSeeder::class);
       $this->call(GenderSeeder::class);
       $this->call(AnnounceStatusSeeder::class);
       $this->call(AnimalTypeSeeder::class);
    }
}
