<?php

namespace App\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['question', 'answer'];
    /**
     * @var string[]
     */
    protected $fillable = ['status', 'author', 'fh_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function faq_head()
    {
        return $this->belongsTo(FaqHead::class, 'fh_id');
    }
}
