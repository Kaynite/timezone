<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class City extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'country_id',
        'created_at',
        'updated_at'
    ];

    public function scopeLocale($q)
    {
        return $q->select('id', 'created_at', 'updated_at', 'name_' . LaravelLocalization::getCurrentLocale() . ' as name', 'country_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
