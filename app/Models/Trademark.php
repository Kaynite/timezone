<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Trademark extends Model
{
    protected $fillable = ['name_ar', 'name_en'];

    public function scopeLocale($q)
    {
        return $q->select('trademarks.*', 'name_' . siteLang() . ' as name');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
