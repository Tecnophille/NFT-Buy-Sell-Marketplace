<?php

namespace App\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model implements TranslatableContract
{
    use SoftDeletes, Translatable;

    public $translatedAttributes = ['title', 'slug', 'description'];

    /**
     * @var string[]
     */
    protected $fillable = ['thumbnail', 'views', 'likes', 'isHotNews', 'isTrending'];
}
