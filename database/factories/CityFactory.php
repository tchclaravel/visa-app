<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'country_id' => 8,
            'city_name'  => $this->faker->city(),
            'city_name_ar'  => 'باللغة العربية',
            'created_at' => now()
        ];
    }
}
