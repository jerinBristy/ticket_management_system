<?php

namespace Database\Factories;

use App\Models\Bus;
use App\Models\Passenger;
use App\Models\SeatType;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bus_id' => Bus::factory(),
            'seat_type_id' => SeatType::factory(),

        ];
    }
}
