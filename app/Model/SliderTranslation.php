<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SliderTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['locale', 'slider_id', 'short_description', 'long_desc_header', 'long_desc_middle', 'long_desc_footer'];
}
