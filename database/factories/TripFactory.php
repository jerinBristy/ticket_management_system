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
            'bus_id' => Bus::factory(),
            'startTime' => $this->faker->time,
            'endTime' => $this->faker->time,
            'route' => $this->faker->text(100),
        ];
    }
}
