<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return[
            DB::table('pages')->insert([
                ['page_title' => 'privacy_policy', 'page_content' => null],
                ['page_title' => 'terms_of_use', 'page_content' => null],
            ])
        ];
    }
}
