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
                'type' => 'regular',
            ]
        );
        \App\Models\Seat::factory(24)->create();
        \App\Models\Route::factory(2)->create();
        \App\Models\Trip::factory(5)->create();
        \App\Models\Passenger::factory(4)->create();




    }
}
