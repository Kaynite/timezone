<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name_ar'        => 'قسم تجريبي',
        'name_en'        => 'Test Category',
        'slug'           => Str::slug('$Test Category'),
        'description_ar' => 'وصف القسم',
        'description_en' => 'Category Description',
        'keywords'       => 'category',
        'icon'           => null,
        'image'          => null,
        'parent_id'      => null,
    ];
});
