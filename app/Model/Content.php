<?php

namespace App\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Content extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['value'];

    protected $fillable = [
        'slug',
    ];
}
