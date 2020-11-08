<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'mob',
        'code',
        'created_at',
        'updated_at'
    ];

    public function scopeLocale($q)
    {
        return $q->select('id', 'name_' . siteLang() . ' as name', 'mob', 'code', 'created_at', 'updated_at');
    }

    public function flag()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
