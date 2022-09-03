<?php

use Illuminate\Database\Seeder;
use App\Model\FaqHead;
use App\Model\FaqHeadTranslation;

class FaqHeadsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FaqHead::create([
            'icon' => 'fas fa-home',
        ]);

        FaqHead::create([
            'icon' => 'fas fa-life-ring',
        ]);

        FaqHead::create([
            'icon' => 'fas fa-bolt',
        ]);

        FaqHead::create([
            'icon' => 'fas fa-pen-nib',
        ]);

        FaqHeadTranslation::create([
            'locale' => 'en',
            'faq_head_id' => 1,
            'title' => 'General',
        ]);

        FaqHeadTranslation::create([
            'locale' => 'ar',
            'faq_head_id' => 1,
            'title' => 'عام',
        ]);

        FaqHeadTranslation::create([
            'locale' => 'es',
            'faq_head_id' => 1,
            'title' => 'General',
        ]);

        FaqHeadTranslation::create([
            'locale' => 'en',
            'faq_head_id' => 2,
            'title' => 'Support',
        ]);

        FaqHeadTranslation::create([
            'locale' => 'ar',
            'faq_head_id' => 2,
            'title' => 'الدعم',
        ]);

        FaqHeadTranslation::create([
            'locale' => 'es',
            'faq_head_id' => 2,
            'title' => 'Apoyo',
        ]);

        FaqHeadTranslation::create([
            'locale' => 'en',
            'faq_head_id' => 3,
            'title' => 'Hosting',
        ]);

        FaqHeadTranslation::create([
            'locale' => 'ar',
            'faq_head_id' => 3,
            'title' => 'الاستضافة',
        ]);

        FaqHeadTranslation::create([
            'locale' => 'es',
            'faq_head_id' => 3,
            'title' => 'Alojamiento',
        ]);

        FaqHeadTranslation::create([
            'locale' => 'en',
            'faq_head_id' => 4,
            'title' => 'Products',
        ]);

        FaqHeadTranslation::create([
            'locale' => 'ar',
            'faq_head_id' => 4,
            'title' => 'منتجات',
        ]);

        FaqHeadTranslation::create([
            'locale' => 'es',
            'faq_head_id' => 4,
            'title' => 'Productos',
        ]);
    }
}
