<?php

use Illuminate\Database\Seeder;
use App\Model\Category;
use App\Model\CategoryTranslation;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'priority' => 1,
            'status' => STATUS_ACTIVE
        ]);

        Category::create([
            'priority' => 2,
            'status' => STATUS_ACTIVE
        ]);

        Category::create([
            'priority' => 3,
            'status' => STATUS_ACTIVE
        ]);

        CategoryTranslation::create([
            'locale' => 'en',
            'category_id' => 1,
            'title' => 'Game',
            'description' => 'Game Category',
        ]);

        CategoryTranslation::create([
            'locale' => 'ar',
            'category_id' => 1,
            'title' => 'لعبة',
            'Description' => 'فئة اللعبة',
        ]);

        CategoryTranslation::create([
            'locale' => 'es',
            'category_id' => 1,
            'title' => 'Juego',
            'description' => 'Categoría de juego',
        ]);

        CategoryTranslation::create([
            'locale' => 'en',
            'category_id' => 2,
            'title' => 'Photography',
            'description' => 'Photography Category',
        ]);

        CategoryTranslation::create([
            'locale' => 'ar',
            'category_id' => 2,
            'title' => 'التصوير',
            'Description' => 'فئة التصوير',
        ]);

        CategoryTranslation::create([
            'locale' => 'es',
            'category_id' => 2,
            'title' => 'Fotografía',
            'description' => 'Categoría de fotografía',
        ]);

        CategoryTranslation::create([
            'locale' => 'en',
            'category_id' => 3,
            'title' => 'Music',
            'description' => 'Music Category',
        ]);

        CategoryTranslation::create([
            'locale' => 'ar',
            'category_id' => 3,
            'title' => 'موسيقى',
            'Description' => 'فئة الموسيقى',
        ]);

        CategoryTranslation::create([
            'locale' => 'es',
            'category_id' => 3,
            'title' => 'Música',
            'description' => 'Categoría de música',
        ]);
    }
}
