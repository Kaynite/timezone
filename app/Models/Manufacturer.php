<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'website',
        'email',
        'phone',
        'facebook',
        'twitter',
        'logo',
        'created_at',
        'updated_at',
    ];

    public function scopeLocale($q)
    {
        return $q->select('id', 'name_' . siteLang() . ' as name', 'website', 'email', 'phone', 'facebook', 'twitter', 'logo', 'created_at', 'updated_at');
    }
}
