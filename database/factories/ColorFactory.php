<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Color;
use Faker\Generator as Faker;

$factory->define(Color::class, function (Faker $faker) {
    return [
        'name_ar' => 'اسود',
        'name_en' => 'Black',
        'color' => '#000000',
    ];
});
