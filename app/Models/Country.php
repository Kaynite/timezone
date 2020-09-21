<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Country extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'mob',
        'code',
        'logo',
        'created_at',
        'updated_at'
    ];

    public function scopeLocale($q)
    {
        return $q->select('id', 'name_' . siteLang() . ' as name', 'mob', 'code', 'logo', 'created_at', 'updated_at');
    }
}
