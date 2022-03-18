<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BankFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bank_name' => $this->faker->company(),
            'account_name' => $this->faker->company(),
            'account_number' => rand(00000 , 99999) . rand(00000 , 99999),
            'iban'          => rand(00000 , 99999) . rand(00000 , 99999)
        ];
    }
}
