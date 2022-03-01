<?php

namespace Database\Factories;

use App\Models\SeatType;
use Illuminate\Database\Eloquent\Factories\Factory;

class RouteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'from_location_id' => random_int(1,2),
            'to_location_id' => random_int(3,4),
            'seat_type_id' => 1,
            'price' => random_int(300,500),
        ];
    }
}
