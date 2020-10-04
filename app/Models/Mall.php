<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mall extends Model
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
        'country_id',
        'address',
        'created_at',
        'updated_at',
    ];

    public function scopeLocale($q)
    {
        return $q->select('id', 'name_' . siteLang() . ' as name', 'website', 'email', 'phone', 'facebook', 'twitter', 'logo', 'country_id', 'address', 'created_at', 'updated_at');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_mall');
    }
}
