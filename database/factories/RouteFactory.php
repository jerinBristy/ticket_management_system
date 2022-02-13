<?php

namespace Database\Factories;

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
            'routeName' => $this->faker->streetName(),
            'startTime' => $this->faker->dateTime
        ];
    }
}
