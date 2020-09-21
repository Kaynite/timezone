<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    protected $fillable = ['unit_ar', 'unit_en'];

    public function scopeLocale($q)
    {
        $lang = siteLang();
        return $q->select('id', "unit_$lang as unit");
    }
}
