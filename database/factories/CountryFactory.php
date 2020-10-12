<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Country;
use Faker\Generator as Faker;

$factory->define(Country::class, function (Faker $faker) {
    return [
        'name_ar' => 'مصر',
        'name_en' => 'Egypt',
        'mob' => '+20',
        'code' => 'EG',
    ];
});
