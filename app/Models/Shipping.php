<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Shipping extends Model
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
        'user_id',
        'created_at',
        'updated_at',
    ];

    public function scopeLocale($q)
    {
        return $q->select('id', 'name_' . LaravelLocalization::getCurrentLocale() . ' as name','website', 'email', 'phone', 'facebook', 'twitter', 'logo', 'user_id', 'created_at', 'updated_at');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
