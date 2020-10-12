<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\City;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {
    return [
        'name_ar' => 'القاهرة',
        'name_en' => 'Cairo',
        'country_id' => '1',
    ];
});
