<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class UserType extends Model
{

    public $table = 'user_types';

    protected $fillable = ['name_en', 'name_ar', 'created_at', 'updated_at'];

    public function scopeLocale($q) {
        return $q->select('id', 'name_' . LaravelLocalization::getCurrentLocale() . ' as name');
    }
}
