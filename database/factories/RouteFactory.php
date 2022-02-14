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
            'seat_type_id' => 1,
            'routeName' => $this->faker->streetName(),
            'startTime' => $this->faker->dateTime,
            'price' => 250
        ];
    }
}
