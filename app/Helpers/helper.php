<?php

use App\Models\Admin;
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
        return Product::locale()->inRandomOrder()->where('id', '!=', request()->route('id'))->inStock()->limit(6)->get();
    }
}

if (!function_exists('topProducts')) {
    function topProducts()
    {
        return Product::locale()->orderBy('views', 'desc')->inStock()->limit(6)->get()->chunk(3);
    }
}

if (!function_exists('unreadNotifications')) {
    function unreadNotifications()
    {
        return Admin::first()->unreadNotifications;
    }
}

if (!function_exists('totalViews')) {
    function totalViews()
    {
        return Product::sum('views');
    }
}