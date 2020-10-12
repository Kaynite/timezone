<?php

use App\Models\Product;
use App\Models\Category;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

if (!function_exists('siteLang')) {
    function siteLang()
    {
        return LaravelLocalization::getCurrentLocale();
    }
}

if (!function_exists('getCategories')) {
    function getCategories()
    {
        return Category::locale()->withCount('products')->whereNull('parent_id')->get();
    }
}

if (!function_exists('relatedProducts')) {
    function relatedProducts()
    {
        return Product::locale()->inRandomOrder()->where('id', '!=', request()->route('id'))->limit(6)->get();
    }
}