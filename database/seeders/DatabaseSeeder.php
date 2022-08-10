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

    public $sudia_cities = array(
        'Riyadh' => 'الرياض',
        'Jeddah' => 'جدة',
        'Abha' => 'ابها',
        'Dammam' => 'الدمام',
        'Tabuk' => 'تبوك',
        'Mecca' => 'مكة',
        'Buraydah' => 'بريدة',
        'Jizan' => 'جيزان',
        'Medina' => 'المدينة',
        'Dhahran' => 'الظهران',
        'Al Jawf' => 'الجوف',
        'Khamis Mushayt' => 'خميس مشيط',
        'Al Bahah' => 'الباحة',
        'Diriyah' => 'الدرعية',
        'Dawadmi' => 'الدوادمي',
        'Jubail' => 'الجبيل',
        'Khafji' => 'الخفجي',
        'Khobar' => 'الخبر',
        'Al Majma’ah' => 'المجمعة',
        'Al-Mubarraz' => 'المبرز',
        'Muzahmiyya' => 'المزاحمية',
        'Najran' => 'نجران',
        'Hofuf' => 'الهفوف',
        'Hafr Al-Batin' => 'حفر الباطن',
        'Qatif' => 'القطيف',
        'Taif' => 'الطائف',
        'Tanomah' => 'تنومه',
        'Al-Ula' => 'العلا',
        'Unaizah' => 'عنيزة',
        'Al Qunfudhah' => 'القنفذة',
        'Yanbu' => 'ينبع',
        'Ar Rass' => 'الرس',
        'Al-Gwei’iyyah' => 'القويعية',
        'Hautat Sudair' => 'حوطة سدير',
        'Al-Hareeq' => 'الحريق',
        'Hotat Bani Tamim' => 'حوطة بني تميم',
        'Al-Namas' => 'النماص',
        'Qadeimah' => 'القدية',
        'Ras Tanura' => 'راس تنورة',
        'Sakakah' => 'سكاكا',
        'Sharurah' => 'شرورة',
        'Shaqraa' => 'شقراء',
        'Uyun AlJiwa' => 'عيون الجواء',
        'Wadi Al-Dawasir' => 'وادي الدواسر',
        'Zulfi' => 'الزلفي',
        'Al Bukayriyah' => 'البكيرية',
        'Baljurashi' => 'بلجرشي',
        'Bisha' => 'بيشة',
    );

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

        foreach($this->sudia_cities as $row => $value){
            \App\Models\PassportCity::factory()->create([
                'city_name_ar' => $value,
                'city_name_en' => $row,
            ]);
        }

        // \App\Models\User::factory(10)->create();
        
        
    }
    
}
