<?php

namespace Database\Seeders;

use App\Models\AnnounceStatus;
use Illuminate\Database\Seeder;

class AnnounceStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AnnounceStatus::create([
            'statusName' => 'new'
        ]);

        AnnounceStatus::create([
            'statusName' => 'on-hold'
        ]);

        AnnounceStatus::create([
            'statusName' => 'adopted'
        ]);
    }
}
