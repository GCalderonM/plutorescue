<?php

namespace Database\Seeders;

use App\Models\Announce;
use App\Models\User;
use Illuminate\Database\Seeder;

class AnnounceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        for ($i = 0; $i <= $users->count(); $i++)
        {
            Announce::factory(5)->create([
                'user_id' => $users->random()->id
            ]);
        }
    }
}
