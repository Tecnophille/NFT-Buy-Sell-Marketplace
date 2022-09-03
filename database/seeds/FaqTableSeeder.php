<?php

use Illuminate\Database\Seeder;
use App\Model\Faq;
use App\Model\FaqTranslation;

class FaqTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faq::create([
            'fh_id' => 1
        ]);

        Faq::create([
            'fh_id' => 2
        ]);

        Faq::create([
            'fh_id' => 3
        ]);

        Faq::create([
            'fh_id' => 4
        ]);

        FaqTranslation::create([
            'locale' => 'en',
            'faq_id' => 1,
            'question' => 'How does it work',
            'answer' => 'Existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now. When, while the lovely valley teems',
        ]);

        FaqTranslation::create([
            'locale' => 'ar',
            'faq_id' => 1,
            'question' => 'كيف يعمل',
            'answer' => 'الوجود في هذه البقعة التي خلقت لنعمة النفوس مثل لي. أنا سعيد جدًا ، يا صديقي العزيز ، منغمس جدًا في الإحساس الرائع بالوجود الهادئ المحض ، لدرجة أنني أهمل مواهبي. يجب أن أكون غير قادر على رسم ضربة واحدة في الوقت الحاضر ؛ ومع ذلك أشعر أنني لم أكن أبدًا فنانًا أعظم من الآن. متى ، بينما يعج الوادي الجميل',
        ]);

        FaqTranslation::create([
            'locale' => 'es',
            'faq_id' => 1,
            'question' => 'How does it work',
            'answer' => 'Existencia en este lugar, que fue creado para la dicha de almas como la mía. Soy tan feliz, mi querido amigo, tan absorto en el exquisito sentido de la mera existencia tranquila, que descuido mis talentos. Sería incapaz de dibujar un solo trazo en este momento; y, sin embargo, siento que nunca fui un artista más grande que ahora. cuando, mientras el hermoso valle bulle',
        ]);

        FaqTranslation::create([
            'locale' => 'en',
            'faq_id' => 2,
            'question' => 'How does it work',
            'answer' => 'Existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now. When, while the lovely valley teems',
        ]);

        FaqTranslation::create([
            'locale' => 'ar',
            'faq_id' => 2,
            'question' => 'كيف يعمل',
            'answer' => 'الوجود في هذه البقعة التي خلقت لنعمة النفوس مثل لي. أنا سعيد جدًا ، يا صديقي العزيز ، منغمس جدًا في الإحساس الرائع بالوجود الهادئ المحض ، لدرجة أنني أهمل مواهبي. يجب أن أكون غير قادر على رسم ضربة واحدة في الوقت الحاضر ؛ ومع ذلك أشعر أنني لم أكن أبدًا فنانًا أعظم من الآن. متى ، بينما يعج الوادي الجميل',
        ]);

        FaqTranslation::create([
            'locale' => 'es',
            'faq_id' => 2,
            'question' => 'How does it work',
            'answer' => 'Existencia en este lugar, que fue creado para la dicha de almas como la mía. Soy tan feliz, mi querido amigo, tan absorto en el exquisito sentido de la mera existencia tranquila, que descuido mis talentos. Sería incapaz de dibujar un solo trazo en este momento; y, sin embargo, siento que nunca fui un artista más grande que ahora. cuando, mientras el hermoso valle bulle',
        ]);

        FaqTranslation::create([
            'locale' => 'en',
            'faq_id' => 3,
            'question' => 'How does it work',
            'answer' => 'Existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now. When, while the lovely valley teems',
        ]);

        FaqTranslation::create([
            'locale' => 'ar',
            'faq_id' => 3,
            'question' => 'كيف يعمل',
            'answer' => 'الوجود في هذه البقعة التي خلقت لنعمة النفوس مثل لي. أنا سعيد جدًا ، يا صديقي العزيز ، منغمس جدًا في الإحساس الرائع بالوجود الهادئ المحض ، لدرجة أنني أهمل مواهبي. يجب أن أكون غير قادر على رسم ضربة واحدة في الوقت الحاضر ؛ ومع ذلك أشعر أنني لم أكن أبدًا فنانًا أعظم من الآن. متى ، بينما يعج الوادي الجميل',
        ]);

        FaqTranslation::create([
            'locale' => 'es',
            'faq_id' => 3,
            'question' => 'How does it work',
            'answer' => 'Existencia en este lugar, que fue creado para la dicha de almas como la mía. Soy tan feliz, mi querido amigo, tan absorto en el exquisito sentido de la mera existencia tranquila, que descuido mis talentos. Sería incapaz de dibujar un solo trazo en este momento; y, sin embargo, siento que nunca fui un artista más grande que ahora. cuando, mientras el hermoso valle bulle',
        ]);

        FaqTranslation::create([
            'locale' => 'en',
            'faq_id' => 4,
            'question' => 'How does it work',
            'answer' => 'Existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now. When, while the lovely valley teems',
        ]);

        FaqTranslation::create([
            'locale' => 'ar',
            'faq_id' => 4,
            'question' => 'كيف يعمل',
            'answer' => 'الوجود في هذه البقعة التي خلقت لنعمة النفوس مثل لي. أنا سعيد جدًا ، يا صديقي العزيز ، منغمس جدًا في الإحساس الرائع بالوجود الهادئ المحض ، لدرجة أنني أهمل مواهبي. يجب أن أكون غير قادر على رسم ضربة واحدة في الوقت الحاضر ؛ ومع ذلك أشعر أنني لم أكن أبدًا فنانًا أعظم من الآن. متى ، بينما يعج الوادي الجميل',
        ]);

        FaqTranslation::create([
            'locale' => 'es',
            'faq_id' => 4,
            'question' => 'How does it work',
            'answer' => 'Existencia en este lugar, que fue creado para la dicha de almas como la mía. Soy tan feliz, mi querido amigo, tan absorto en el exquisito sentido de la mera existencia tranquila, que descuido mis talentos. Sería incapaz de dibujar un solo trazo en este momento; y, sin embargo, siento que nunca fui un artista más grande que ahora. cuando, mientras el hermoso valle bulle',
        ]);
    }
}
