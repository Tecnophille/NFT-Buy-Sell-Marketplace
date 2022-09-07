<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ContentTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['locale', 'content_id', 'value'];
}
