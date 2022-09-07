<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FaqTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = ['locale', 'faq_id', 'question', 'answer'];
}
