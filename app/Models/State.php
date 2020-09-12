<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class State extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'city_id',
        'country_id',
        'created_at',
        'updated_at'
    ];

    public function scopeLocale($q)
    {
        return $q->select('id', 'created_at', 'updated_at', 'name_' . LaravelLocalization::getCurrentLocale() . ' as name', 'country_id', 'city_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
