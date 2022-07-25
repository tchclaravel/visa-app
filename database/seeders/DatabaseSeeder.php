<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        \App\Models\Admin::factory()->create([
            'username' => 'Admin',
            'password' => Hash::make('AbdoPass@123'), // Password = AbdoPass@123
        ]);
        \App\Models\Country::factory()->create([
            'country_name' => 'SUDAN',
            'country_name_ar' => 'السودان',
        ]);
        \App\Models\City::factory()->create([
            'country_id' => 1,
            'city_name' => 'Khartoum',
            'city_name_ar' => 'الخرطوم',
        ]);
        \App\Models\Bank::factory()->create([
            'bank_name' => 'بنك الراجحي',
            'account_name' => 'شركة سوداسوفت',
            'account_number' => 6235980,
            'iban' => '78365HAX34Z8BX878CA798',
        ]);
        \App\Models\Appointment::factory()->create([
            'title' => 'سوف نتواصل معك خلال أسبوعين'
        ]);

        // \App\Models\User::factory(10)->create();
        
        
    }
    
}
