<?php

namespace App\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class FaqHead extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['title'];
    /**
     * @var string[]
     */
    protected $fillable = [
        'icon'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function faqs()
    {
        return $this->hasMany(Faq::class, 'fh_id');
    }
}
