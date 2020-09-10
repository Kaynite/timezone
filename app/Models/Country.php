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

    public function scopeLocale()
    {
        return $this->select('id', 'mob', 'code', 'logo', 'created_at', 'updated_at', 'name_' . LaravelLocalization::getCurrentLocale() . ' as name');
    }
}
