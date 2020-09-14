<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Category extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'description_ar',
        'description_en',
        'keywords',
        'icon',
        'image',
        'parent_id',
        'created_at',
        'updated_at'
    ];

    public function scopeTreeJson($q)
    {
        return $q->select(
            'id',
            'name_' . LaravelLocalization::getCurrentLocale() . ' as text',
            'icon',
            'parent_id as parent'
        );
    }
}
