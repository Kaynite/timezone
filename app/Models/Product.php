<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title_ar',
        'title_en',
        'image_id',
        'content',
        'category_id',
        'trademark_id',
        'manufacturer_id',
        'color_id',
        'weight',
        'weight_id',
        'size',
        'size_id',
        'stock',
        'stock_starts_at',
        'stock_ends_at',
        'offer_price',
        'offer_starts_at',
        'offer_ends_at',
        'other_data',
        'status',
        'rejection_reason',
        'price',
    ];

    public function scopeLocale($q)
    {
        $lang = siteLang();
        return $q->select(
            'id',
            "title_$lang as title",
            'image_id',
            'content',
            'category_id',
            'trademark_id',
            'manufacturer_id',
            'color_id',
            'weight',
            'weight_id',
            'size',
            'size_id',
            'stock',
            'stock_starts_at',
            'stock_ends_at',
            'offer_price',
            'offer_starts_at',
            'offer_ends_at',
            'other_data',
            'status',
            'rejection_reason',
            'price',
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault(['name' => 'null']);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function mainImage()
    {
        return $this->belongsTo(ProductImage::class, 'image_id', 'id');
    }

    public function malls()
    {
        return $this->belongsToMany(Mall::class, 'product_mall');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class)->locale();
    }

    public function color()
    {
        return $this->belongsTo(Color::class)->locale();
    }

}
