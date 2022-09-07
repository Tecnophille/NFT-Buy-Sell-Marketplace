<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Model\News;
use App\Model\NewsTranslation;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        News::create([
            'thumbnail' => '1.jpg',
            'isHotNews' => 1,
            'IsTrending' => 1
        ]);
        News::create([
            'thumbnail' => '2.jpg',
            'isHotNews' => 1,
            'IsTrending' => 1
        ]);
        News::create([
            'thumbnail' => '3.jpg',
            'isHotNews' => 1,
            'IsTrending' => 1
        ]);

        NewsTranslation::create([
            'locale' => 'en',
            'news_id' => 1,
            'title' => 'Record price drop of Bitcoin is about 5.6%',
            'description' => '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem  ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,  sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>',
        ]);

        NewsTranslation::create([
            'locale' => 'ar',
            'news_id' => 1,
            'title' => 'انخفض سعر البيتكوين القياسي بحوالي 5.6٪',
            'description' => '<p>ولكن لكي تفهم من أين يكون كل خطأ مولودًا لذة الاتهام والثناء على الألم ، فسأشرح كل ما قيل من قبل مخترع الحقيقة هذا وباعتباره مهندس الحياة المباركة. فلا أحد يرفض المتعة أو يكرهها أو يتجنبها ، لأنها متعة بحد ذاتها ، ولكن لأن الآلام الشديدة تنجم عن أولئك الذين لا يعرفون كيف يتبعون اللذة بالعقل. علاوة على ذلك ، لا يوجد من يرغب في الحصول على الألم ، لأن الألم نفسه هو حب وتقوى ، ويريد اكتسابه ، ولكن لأن أوقاتًا من هذا القبيل لا تحدث ، حتى أنه من خلال الكد والألم قد يبحث عن بعض اللذة الكبيرة. فمن منا يقوم ، إلى أدنى درجة ، بأي تمرين بدني شاق ، باستثناء الحصول على بعض المزايا منه؟ ولكن من يستطيع أن يدين بحق من يريد أن يكون في تلك المتعة التي لا تنتج عن أي إزعاج؟</p>',
        ]);

        NewsTranslation::create([
            'locale' => 'es',
            'news_id' => 1,
            'title' => 'La caída récord del precio de Bitcoin es de alrededor del 5,6%',
            'description' => '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem  ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,  sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>',
        ]);

        NewsTranslation::create([
            'locale' => 'en',
            'news_id' => 2,
            'title' => 'New Coin in the market!',
            'description' => '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem  ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,  sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>',
        ]);

        NewsTranslation::create([
            'locale' => 'ar',
            'news_id' => 2,
            'title' => 'عملة جديدة في السوق!',
            'description' => '<p>ولكن لكي تفهم من أين يكون كل خطأ مولودًا لذة الاتهام والثناء على الألم ، فسأشرح كل ما قيل من قبل مخترع الحقيقة هذا وباعتباره مهندس الحياة المباركة. فلا أحد يرفض المتعة أو يكرهها أو يتجنبها ، لأنها متعة بحد ذاتها ، ولكن لأن الآلام الشديدة تنجم عن أولئك الذين لا يعرفون كيف يتبعون اللذة بالعقل. علاوة على ذلك ، لا يوجد من يرغب في الحصول على الألم ، لأن الألم نفسه هو حب وتقوى ، ويريد اكتسابه ، ولكن لأن أوقاتًا من هذا القبيل لا تحدث ، حتى أنه من خلال الكد والألم قد يبحث عن بعض اللذة الكبيرة. فمن منا يقوم ، إلى أدنى درجة ، بأي تمرين بدني شاق ، باستثناء الحصول على بعض المزايا منه؟ ولكن من يستطيع أن يدين بحق من يريد أن يكون في تلك المتعة التي لا تنتج عن أي إزعاج؟</p>',
        ]);

        NewsTranslation::create([
            'locale' => 'es',
            'news_id' => 2,
            'title' => 'Nueva moneda en el mercado!',
            'slug' => Str::of('New Coin in the market!')->slug('-'),
            'description' => '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem  ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,  sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>',
        ]);

        NewsTranslation::create([
            'locale' => 'en',
            'news_id' => 3,
            'title' => 'What’s happening in the crypto world?',
            'slug' => Str::of('What’s happening in the crypto world?')->slug('-'),
            'description' => '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem  ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,  sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>',
        ]);

        NewsTranslation::create([
            'locale' => 'ar',
            'news_id' => 3,
            'title' => 'ماذا يحدث في عالم التشفير؟',
            'slug' => Str::of('What’s happening in the crypto world?')->slug('-'),
            'description' => '<p>ولكن لكي تفهم من أين يكون كل خطأ مولودًا لذة الاتهام والثناء على الألم ، فسأشرح كل ما قيل من قبل مخترع الحقيقة هذا وباعتباره مهندس الحياة المباركة. فلا أحد يرفض المتعة أو يكرهها أو يتجنبها ، لأنها متعة بحد ذاتها ، ولكن لأن الآلام الشديدة تنجم عن أولئك الذين لا يعرفون كيف يتبعون اللذة بالعقل. علاوة على ذلك ، لا يوجد من يرغب في الحصول على الألم ، لأن الألم نفسه هو حب وتقوى ، ويريد اكتسابه ، ولكن لأن أوقاتًا من هذا القبيل لا تحدث ، حتى أنه من خلال الكد والألم قد يبحث عن بعض اللذة الكبيرة. فمن منا يقوم ، إلى أدنى درجة ، بأي تمرين بدني شاق ، باستثناء الحصول على بعض المزايا منه؟ ولكن من يستطيع أن يدين بحق من يريد أن يكون في تلك المتعة التي لا تنتج عن أي إزعاج؟</p>',
        ]);

        NewsTranslation::create([
            'locale' => 'es',
            'news_id' => 3,
            'title' => 'Qué está pasando en el mundo de las criptomonedas?',
            'slug' => Str::of('What’s happening in the crypto world?')->slug('-'),
            'description' => '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem  ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,  sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>',
        ]);
    }
}
