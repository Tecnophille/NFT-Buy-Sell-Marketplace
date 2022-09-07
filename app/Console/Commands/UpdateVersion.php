<?php

namespace App\Console\Commands;

use App\Model\Category;
use App\Model\CategoryTranslation;
use App\Model\Content;
use App\Model\ContentTranslation;
use App\Model\Faq;
use App\Model\FaqHead;
use App\Model\FaqHeadTranslation;
use App\Model\FaqTranslation;
use App\Model\Language;
use App\Model\News;
use App\Model\NewsTranslation;
use App\Model\Setting;
use App\Model\Slider;
use App\Model\SliderTranslation;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateVersion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:version';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update application version';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::beginTransaction();
        try {
            $allsetting = allsetting();
            if(!isset($allsetting['version'])) {
                Setting::create(['slug' => 'version', 'value' => 2]);
            }
            if(allsetting('version') < config('app.version')) {
                Setting::where('slug', 'version')->update(['value' => config('app.version')]);
            }
            if(!isset($allsetting['preloader_logo'])) {
                Setting::create(['slug' => 'preloader_logo', 'value' => '']);
            }
            if(!isset($allsetting['meta_title'])) {
                Setting::create(['slug' => 'meta_title', 'value' => 'Nftzai - NFT Buy/Sell Marketplace']);
            }
            if(!isset($allsetting['meta_description'])) {
                Setting::create(['slug' => 'meta_description', 'value' => 'NFT Buy/Sell Marketplace']);
            }
            if(!isset($allsetting['meta_keywords'])) {
                Setting::create(['slug' => 'meta_keywords', 'value' => 'crypto currency, currency, crypto, nft marketplace, NFT, nft, NFT marketplace']);
            }
            if(!isset($allsetting['meta_author'])) {
                Setting::create(['slug' => 'meta_author', 'value' => 'zainiktheme']);
            }
            if(!isset($allsetting['cdn_base'])) {
                Setting::create(['slug' => 'cdn_base', 'value' => 'nftzai.zainikthemes.com']);
            }
            if(!isset($allsetting['is_cdn'])) {
                Setting::create(['slug' => 'is_cdn', 'value' => 0]);
            }

            $language = Language::first();
            if(is_null($language)) {
                Language::create([
                    'prefix' => 'en',
                    'name' => 'English',
                    'direction' => 'ltr',
                ]);
            }

            $categories = Category::get();
            foreach($categories as $category) {
                $cat_translation = CategoryTranslation::where(['category_id' => $category->id])->first();
                if(is_null($cat_translation)) {
                    CategoryTranslation::create([
                        'locale' => 'en',
                        'category_id' => $category->id,
                        'title' => $category->title,
                        'description' => $category->description,
                    ]);
                }
            }

            $faqhead = FaqHead::get();
            foreach($faqhead as $fh) {
                $fh_translation = FaqHeadTranslation::where(['faq_head_id' => $fh->id])->first();
                if(is_null($fh_translation)) {
                    FaqHeadTranslation::create([
                        'locale' => 'en',
                        'faq_head_id' => $fh->id,
                        'title' => $fh->title,
                    ]);
                }
            }

            $faqs = Faq::get();
            foreach($faqs as $faq) {
                $faq_translation = FaqTranslation::where(['faq_id' => $faq->id])->first();
                if(is_null($faq_translation)) {
                    FaqTranslation::create([
                        'locale' => 'en',
                        'faq_id' => $faq->id,
                        'question' => $faq->question,
                        'answer' => $faq->answer,
                    ]);
                }
            }

            $news = News::get();
            foreach($news as $nw) {
                $news_translation = NewsTranslation::where(['news_id' => $nw->id])->first();
                if(is_null($news_translation)) {
                    NewsTranslation::create([
                        'locale' => 'en',
                        'news_id' => $nw->id,
                        'title' => $nw->title,
                        'description' => $nw->description,
                    ]);
                }
            }

            $sliders = Slider::get();
            foreach($sliders as $slider) {
                $slider_translation = SliderTranslation::where(['slider_id' => $slider->id])->first();
                if(is_null($slider_translation)) {
                    SliderTranslation::create([
                        'locale' => 'en',
                        'slider_id' => $slider->id,
                        'short_description' => $slider->short_description,
                        'long_desc_header' => $slider->long_desc_header,
                        'long_desc_middle' => $slider->long_desc_middle,
                        'long_desc_footer' => $slider->long_desc_footer,
                    ]);
                }
            }

            $home_famous_title = Content::where('slug', 'home_famous_title')->first();

            if(is_null($home_famous_title)) {
                $contemt_create = Content::create(['slug' => 'home_famous_title']);
                if(!empty($contemt_create)) {
                    ContentTranslation::create([
                        'locale' => 'en',
                        'content_id' => $contemt_create->id,
                        'value' => 'Top famous NFTs and authors all in one place',
                    ]);
                }

            }

            $home_famous_content = Content::where('slug', 'home_famous_content')->first();
            if(is_null($home_famous_content)) {
                $contemt_create = Content::create(['slug' => 'home_famous_content']);
                if(!empty($contemt_create)) {
                    ContentTranslation::create([
                        'locale' => 'en',
                        'content_id' => $contemt_create->id,
                        'value' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.',
                    ]);
                }

            }

            $home_latest_title = Content::where('slug', 'home_latest_title')->first();
            if(is_null($home_latest_title)) {
                $contemt_create = Content::create(['slug' => 'home_latest_title']);
                if(!empty($contemt_create)) {
                    ContentTranslation::create([
                        'locale' => 'en',
                        'content_id' => $contemt_create->id,
                        'value' => 'Latest Collection',
                    ]);
                }
            }

            $home_latest_content = Content::where('slug', 'home_latest_content')->first();
            if(is_null($home_latest_content)) {
                $contemt_create = Content::create(['slug' => 'home_latest_content']);
                if(!empty($contemt_create)) {
                    ContentTranslation::create([
                        'locale' => 'en',
                        'content_id' => $contemt_create->id,
                        'value' => 'Meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner',
                    ]);
                }
            }

            $home_explorer_title = Content::where('slug', 'home_explorer_title')->first();
            if(is_null($home_explorer_title)) {
                $contemt_create = Content::create(['slug' => 'home_explorer_title']);
                if(!empty($contemt_create)) {
                    ContentTranslation::create([
                        'locale' => 'en',
                        'content_id' => $contemt_create->id,
                        'value' => 'Explore More',
                    ]);
                }

            }

            $home_explorer_content = Content::where('slug', 'home_explorer_content')->first();
            if(is_null($home_explorer_content)) {
                $contemt_create = Content::create(['slug' => 'home_explorer_content']);
                if(!empty($contemt_create)) {
                    ContentTranslation::create([
                        'locale' => 'en',
                        'content_id' => $contemt_create->id,
                        'value' => 'Meridian sun strikes the upper surface of the impenetrable foliatrees and but a few stray gleams steal into the inner',
                    ]);
                }

            }

            $home_footer_title = Content::where('slug', 'home_footer_title')->first();
            if(is_null($home_footer_title)) {
                $contemt_create = Content::create(['slug' => 'home_footer_title']);
                if(!empty($contemt_create)) {
                    ContentTranslation::create([
                        'locale' => 'en',
                        'content_id' => $contemt_create->id,
                        'value' => 'Get started with us today',
                    ]);
                }
            }

            $home_footer_content = Content::where('slug', 'home_footer_content')->first();
            if(is_null($home_footer_content)) {
                $contemt_create = Content::create(['slug' => 'home_footer_content']);
                if(!empty($contemt_create)) {
                    ContentTranslation::create([
                        'locale' => 'en',
                        'content_id' => $contemt_create->id,
                        'value' => 'Earn exciting points and free crypto by submitting your work.',
                    ]);
                }
            }

            $counters_title = Content::where('slug', 'counters_title')->first();
            if(is_null($counters_title)) {
                $contemt_create = Content::create(['slug' => 'counters_title']);
                if(!empty($contemt_create)) {
                    ContentTranslation::create([
                        'locale' => 'en',
                        'content_id' => $contemt_create->id,
                        'value' => 'Amazing traditional Artworks, which is trending now',
                    ]);
                }
            }

            $counters_content_one = Content::where('slug', 'counters_content_one')->first();
            if(is_null($counters_content_one)) {
                $contemt_create = Content::create(['slug' => 'counters_content_one']);
                if(!empty($contemt_create)) {
                    ContentTranslation::create([
                        'locale' => 'en',
                        'content_id' => $contemt_create->id,
                        'value' => 'Artwork',
                    ]);
                }
            }

            $counters_content_two = Content::where('slug', 'counters_content_two')->first();
            if(is_null($counters_content_two)) {
                $contemt_create = Content::create(['slug' => 'counters_content_two']);
                if(!empty($contemt_create)) {
                    ContentTranslation::create([
                        'locale' => 'en',
                        'content_id' => $contemt_create->id,
                        'value' => 'Auction',
                    ]);
                }
            }

            $counters_content_three = Content::where('slug', 'counters_content_three')->first();
            if(is_null($counters_content_three)) {
                $contemt_create = Content::create(['slug' => 'counters_content_three']);
                if(!empty($contemt_create)) {
                    ContentTranslation::create([
                        'locale' => 'en',
                        'content_id' => $contemt_create->id,
                        'value' => 'Artist',
                    ]);
                }
            }
            $message = 'Successfully migrated to NFTZai v2';
            DB::commit();
        }catch (\Exception $e) {
            DB::rollBack();
            $message = $e->getMessage();
        }
        $this->info($message);

    }
}
