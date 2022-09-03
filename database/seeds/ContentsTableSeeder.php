<?php

use Illuminate\Database\Seeder;
use App\Model\Content;
use App\Model\ContentTranslation;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Content::create([
            'slug' => 'home_famous_title',
        ]);
        Content::create([
            'slug' => 'home_famous_content',
        ]);
        Content::create([
            'slug' => 'home_latest_title',
        ]);
        Content::create([
            'slug' => 'home_latest_content',
        ]);
        Content::create([
            'slug' => 'home_explorer_title',
        ]);
        Content::create([
            'slug' => 'home_explorer_content',
        ]);
        Content::create([
            'slug' => 'home_footer_title',
        ]);
        Content::create([
            'slug' => 'home_footer_content',
        ]);


        Content::create([
            'slug' => 'counters_title',
        ]);
        Content::create([
            'slug' => 'counters_content_one',
        ]);
        Content::create([
            'slug' => 'counters_content_two',
        ]);
        Content::create([
            'slug' => 'counters_content_three',
        ]);

        ContentTranslation::create([
            'locale' => 'en',
            'content_id' => 1,
            'value' => 'Top famous NFTs and authors all in one place',
        ]);

        ContentTranslation::create([
            'locale' => 'ar',
            'content_id' => 1,
            'value' => 'أفضل NFTs والمؤلفين المشهورين في مكان واحد',
        ]);

        ContentTranslation::create([
            'locale' => 'es',
            'content_id' => 1,
            'value' => 'Los mejores NFT y autores famosos, todo en un solo lugar',
        ]);

        ContentTranslation::create([
            'locale' => 'en',
            'content_id' => 2,
            'value' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.',
        ]);

        ContentTranslation::create([
            'locale' => 'ar',
            'content_id' => 2,
            'value' => 'من الخطأ الشامل أن يكون هناك خطأ في الحالة الطبيعية ، حيث يمكن تفسير الأمر بشكل واضح.',
        ]);

        ContentTranslation::create([
            'locale' => 'es',
            'content_id' => 2,
            'value' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.',
        ]);

        ContentTranslation::create([
            'locale' => 'en',
            'content_id' => 3,
            'value' => 'Latest Collection',
        ]);

        ContentTranslation::create([
            'locale' => 'ar',
            'content_id' => 3,
            'value' => 'أحدث مجموعة',
        ]);

        ContentTranslation::create([
            'locale' => 'es',
            'content_id' => 3,
            'value' => 'Última Colección',
        ]);

        ContentTranslation::create([
            'locale' => 'en',
            'content_id' => 4,
            'value' => 'Meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner',
        ]);

        ContentTranslation::create([
            'locale' => 'ar',
            'content_id' => 4,
            'value' => 'تضرب شمس ميريديان السطح العلوي لأوراق الشجر التي لا يمكن اختراقها من أشجاري ، ولكن بعض الومضات الضالة تسرق الداخل',
        ]);

        ContentTranslation::create([
            'locale' => 'es',
            'content_id' => 4,
            'value' => 'El sol meridiano golpea la superficie superior del follaje impenetrable de mis árboles, y solo unos pocos destellos perdidos se cuelan en el interior.',
        ]);

        ContentTranslation::create([
            'locale' => 'en',
            'content_id' => 5,
            'value' => 'Explore More',
        ]);

        ContentTranslation::create([
            'locale' => 'ar',
            'content_id' => 5,
            'value' => 'استكشاف المزيد',
        ]);

        ContentTranslation::create([
            'locale' => 'es',
            'content_id' => 5,
            'value' => 'Explora Más',
        ]);

        ContentTranslation::create([
            'locale' => 'en',
            'content_id' => 6,
            'value' => 'Meridian sun strikes the upper surface of the impenetrable foliatrees and but a few stray gleams steal into the inner',
        ]);

        ContentTranslation::create([
            'locale' => 'ar',
            'content_id' => 6,
            'value' => 'تضرب شمس ميريديان السطح العلوي للأشجار الورقية التي لا يمكن اختراقها ، لكن القليل من الومضات الضالة تسرق الداخل',
        ]);

        ContentTranslation::create([
            'locale' => 'es',
            'content_id' => 6,
            'value' => 'Meridian sun strikes the upper surface of the impenetrable foliatrees and but a few stray gleams steal into the inner',
        ]);

        ContentTranslation::create([
            'locale' => 'en',
            'content_id' => 7,
            'value' => 'Get started with us today',
        ]);

        ContentTranslation::create([
            'locale' => 'ar',
            'content_id' => 7,
            'value' => 'ابدأ معنا اليوم',
        ]);

        ContentTranslation::create([
            'locale' => 'es',
            'content_id' => 7,
            'value' => 'Comienza con nosotros hoy',
        ]);

        ContentTranslation::create([
            'locale' => 'en',
            'content_id' => 8,
            'value' => 'Earn exciting points and free crypto by submitting your work.',
        ]);

        ContentTranslation::create([
            'locale' => 'ar',
            'content_id' => 8,
            'value' => 'اربح نقاطًا مثيرة وتشفيرًا مجانيًا من خلال إرسال عملك.',
        ]);

        ContentTranslation::create([
            'locale' => 'es',
            'content_id' => 8,
            'value' => 'Gane puntos emocionantes y criptografía gratis al enviar su trabajo.',
        ]);

        ContentTranslation::create([
            'locale' => 'en',
            'content_id' => 9,
            'value' => 'Amazing traditional Artworks, which is trending now',
        ]);

        ContentTranslation::create([
            'locale' => 'ar',
            'content_id' => 9,
            'value' => 'الأعمال الفنية التقليدية المدهشة ، والتي تتجه الآن',
        ]);

        ContentTranslation::create([
            'locale' => 'es',
            'content_id' => 9,
            'value' => 'Increíbles obras de arte tradicionales, que están de moda ahora',
        ]);

        ContentTranslation::create([
            'locale' => 'en',
            'content_id' => 10,
            'value' => 'Artwork',
        ]);

        ContentTranslation::create([
            'locale' => 'ar',
            'content_id' => 10,
            'value' => 'عمل فني',
        ]);

        ContentTranslation::create([
            'locale' => 'es',
            'content_id' => 10,
            'value' => 'Obra de arte',
        ]);

        ContentTranslation::create([
            'locale' => 'en',
            'content_id' => 11,
            'value' => 'Auction',
        ]);

        ContentTranslation::create([
            'locale' => 'ar',
            'content_id' => 11,
            'value' => 'مزاد علني',
        ]);

        ContentTranslation::create([
            'locale' => 'es',
            'content_id' => 11,
            'value' => 'Subasta',
        ]);

        ContentTranslation::create([
            'locale' => 'en',
            'content_id' => 12,
            'value' => 'Artist',
        ]);

        ContentTranslation::create([
            'locale' => 'ar',
            'content_id' => 12,
            'value' => 'فنان',
        ]);

        ContentTranslation::create([
            'locale' => 'es',
            'content_id' => 12,
            'value' => 'Artista',
        ]);


    }
}
