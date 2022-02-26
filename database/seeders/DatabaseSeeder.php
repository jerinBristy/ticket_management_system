<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('seat_types')->insert([
                ['type' => 'regular'],
                ['type' => 'premium']
            ]
        );
        \App\Models\Seat::factory(24)->create();
        \App\Models\Location::factory(4)->create();
        DB::table('routes')->insert([
            [
                'from_location_id' => 1,
                'to_location_id' => 2
            ],
            [
                'from_location_id' => 3,
                'to_location_id' => 4
            ],
            [
                'from_location_id' => 1,
                'to_location_id' => 3
            ],
            [
                'from_location_id' => 2,
                'to_location_id' => 1
            ],
        ]);
        \App\Models\Driver::factory(7)->create();
        \App\Models\Trip::factory(5)->create();
        \App\Models\Passenger::factory(4)->create();
        DB::table('seat_layouts')->insert([
            [
                'design' => '/images/layout1.png',
                'premiumSeat' =>'6',
                'regularSeat' => '24'
            ],
            [
                'design' => '/images/layout2.png',
                'premiumSeat' =>'0',
                'regularSeat' => '32'
            ]
        ]);

    }
}
