<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'color',
        'created_at',
        'updated_at',
    ];

    public function scopeLocale($q)
    {
        $lang = siteLang();
        return $q->select('id', "name_$lang as name", 'color', 'created_at', 'updated_at');
    }

}
