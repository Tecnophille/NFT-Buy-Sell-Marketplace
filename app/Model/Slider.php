<?php

namespace App\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['short_description', 'long_desc_header', 'long_desc_middle', 'long_desc_footer'];
    /**
     * @var string[]
     */
    protected $fillable = [
      'status',
    ];
}
