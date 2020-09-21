<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = ['name_ar', 'name_en', 'category_id', 'public'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeLocale($q)
    {
        $lang = siteLang();
        return $q->select('id', "name_$lang as name", 'category_id', 'public');
    }
}
