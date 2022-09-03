<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = ['locale', 'category_id', 'title', 'description'];
}
