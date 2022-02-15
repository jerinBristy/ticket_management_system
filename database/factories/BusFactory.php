<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'plateNo' => $this->faker->numberBetween(1000,9999),
            'type' => $this->faker->userName,
        ];
    }
}
