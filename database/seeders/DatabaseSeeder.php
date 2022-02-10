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
         \App\Models\User::factory(1)->create();
        \App\Models\Bus::factory(4)->create();
        \App\Models\Trip::factory(1)->create();
        \App\Models\SeatType::factory(2)->create();
        \App\Models\Seat::factory(4)->create();
        \App\Models\Passenger::factory(4)->create();



    }
}
