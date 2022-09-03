<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FaqHeadTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = ['locale', 'faq_head_id', 'title'];
}
