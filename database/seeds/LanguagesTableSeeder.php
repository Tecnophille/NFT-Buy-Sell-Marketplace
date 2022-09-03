<?php

use Illuminate\Database\Seeder;
use App\Model\Language;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
            'prefix' => 'en',
            'name' => 'English',
            'direction' => 'ltr',
        ]);

        Language::create([
            'prefix' => 'es',
            'name' => 'Spanish',
            'direction' => 'ltr',
        ]);

        Language::create([
            'prefix' => 'ar',
            'name' => 'Arabic',
            'direction' => 'rtl',
        ]);
    }
}
