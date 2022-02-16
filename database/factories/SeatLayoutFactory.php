<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SeatLayoutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            [
                'design' => 'layout1.png',
                'premiumSeat' =>'6',
                'regularSeat' => '24'
            ],
            [
                'design' => 'layout2.png',
                'premiumSeat' =>'0',
                'regularSeat' => '32'
            ]
        ];
    }
}
