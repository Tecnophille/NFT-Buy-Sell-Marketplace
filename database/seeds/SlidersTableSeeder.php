<?php

use Illuminate\Database\Seeder;
use App\Model\Slider;
use App\Model\SliderTranslation;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::create([
            'status' => 1,
        ]);

        SliderTranslation::create([
            'locale' => 'en',
            'slider_id' => 1,
            'short_description' => 'Buy and sell NFTs from the world’s top artists',
            'long_desc_header' => 'The',
            'long_desc_middle' => 'New World',
            'long_desc_footer' => 'of Digital Collectibles',
        ]);

        SliderTranslation::create([
            'locale' => 'ar',
            'slider_id' => 1,
            'short_description' => 'شراء وبيع NFTs من أفضل الفنانين في العالم',
            'long_desc_header' => 'ال',
            'long_desc_middle' => 'عالم جديد',
            'long_desc_footer' => 'المقتنيات الرقمية',
        ]);

        SliderTranslation::create([
            'locale' => 'es',
            'slider_id' => 1,
            'short_description' => 'Compra y vende NFT de los mejores artistas del mundo',
            'long_desc_header' => 'El',
            'long_desc_middle' => 'Nuevo mundo',
            'long_desc_footer' => 'de Coleccionables Digitales',
        ]);
    }
}
