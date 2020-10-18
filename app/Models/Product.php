<?php

namespace App\Models;

use App\Models\Image;
use App\Scopes\InStockScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title_ar',
        'title_en',
        'slug',
        'description',
        'overview',
        'image_id',
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
        'price',
        'views'
    ];

    public function scopeLocale($q)
    {
        $lang = siteLang();
        return $q->select('products.*',"title_$lang as title");
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault(['name' => 'null']);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function mainImage()
    {
        return $this->belongsTo(Image::class, 'image_id', 'id');
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

    public function trademark()
    {
        return $this->belongsTo(Trademark::class)->locale();
    }

    public function reviews()
    {
        return $this->hasMany(Review::class)->latest();
    }

    public function score()
    {
        return $this->hasOne(Review::class)
            ->selectRaw('avg(rating) as avgRating, floor(avg(rating)) as stars')
            ->groupBy('product_id')
            ->withDefault(['avgRating' => 0, 'stars' => 0]);
    }

    public function scopeInStock($q)
    {
        return $q->where('stock', '>', '0');
    }
}
