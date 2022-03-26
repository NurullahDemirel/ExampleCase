<?php

namespace Database\Factories\PreSeller;

use Illuminate\Database\Eloquent\Factories\Factory;

class PreSellerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname'=>$this->faker->firstName,
            'lastname'=>$this->faker->lastName
        ];
    }
}
