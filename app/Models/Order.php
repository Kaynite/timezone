<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'address_1',
        'address_2',
        'country_id',
        'city_id',
        'state',
        'post_code',
        'subtotal',
        'discount',
        'discount_code',
        'tax',
        'total',
        'payment_method',
        'comment',
        'shipped',
        'error'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot(['quantity']);
    }

    public function country()
    {
        return $this->belongsTo(Country::class)->locale();
    }

    
    public function city()
    {
        return $this->belongsTo(City::class)->locale();
    }
}
