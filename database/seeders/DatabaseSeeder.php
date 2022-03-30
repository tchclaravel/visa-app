<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\Page::factory()->create(['page_title' => 'privacy_policy',]);
        \App\Models\Page::factory()->create(['page_title' => 'terms_of_use',]);
        // \App\Models\User::factory(10)->create();
        // \App\Models\Country::factory(3)->create();
        // \App\Models\City::factory(3)->create();
        // \App\Models\Bank::factory(3)->create();
        // \App\Models\Appointment::factory(3)->create();
        
        
    }
}
