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

    public function scopeLocale($q)
    {
        $lang = siteLang();
        return $q->select('id', "name_$lang as name", "description_$lang as description", 'keywords', 'icon', 'image', 'parent_id', 'created_at', 'updated_at');
    }

    public function products()
    {
        return $this->hasMany(Product::class)->locale();
    }
}
