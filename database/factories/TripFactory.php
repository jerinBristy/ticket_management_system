<?php

namespace Database\Factories;

use App\Models\Bus;
use Illuminate\Database\Eloquent\Factories\Factory;

class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bus_id' => random_int(1,4),
            'route_id' => random_int(1,2),
            'driver_id' => random_int(1,7),
            'startTime' => $this->faker->dateTime,

        ];
    }
}
