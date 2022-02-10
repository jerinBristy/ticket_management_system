<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Bus::factory(4)->create();
    }
}
