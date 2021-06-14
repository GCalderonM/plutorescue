<?php

namespace Database\Seeders;

use App\Models\AnimalType;
use Illuminate\Database\Seeder;

class AnimalTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AnimalType::create([
            'typeName' => 'dog'
        ]);

        AnimalType::create([
            'typeName' => 'cat'
        ]);

        AnimalType::create([
            'typeName' => 'bird'
        ]);

        AnimalType::create([
            'typeName' => 'rodent'
        ]);
    }
}
