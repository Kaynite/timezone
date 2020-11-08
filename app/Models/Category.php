<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Category extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'slug',
        'description_ar',
        'description_en',
        'keywords',
        'icon',
        'parent_id',
        'created_at',
        'updated_at'
    ];

    public function scopeTreeJson($q)
    {
        $lang = siteLang();
        return $q->select(
            'id',
            "name_$lang as text",
            'icon',
            'parent_id as parent'
        );
    }

    public function scopeLocale($q)
    {
        $lang = siteLang();
        return $q->select('id', "name_$lang as name", "description_$lang as description", 'slug', 'keywords', 'icon', 'parent_id', 'created_at', 'updated_at');
    }

    public function products()
    {
        return $this->hasMany(Product::class)->inStock()->locale();
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
