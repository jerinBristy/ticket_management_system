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
            'from' => $this->faker->streetSuffix,
            'to' => $this->faker->streetSuffix,
            'startTime' => $this->faker->dateTime,
        ];
    }
}
