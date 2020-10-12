<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Manufacturer;
use Faker\Generator as Faker;

$factory->define(Manufacturer::class, function (Faker $faker) {
    return [
        'name_ar'  => $faker->name,
        'name_en'  => $faker->words(2, true),
        'website'  => $faker->domainName,
        'email'    => $faker->email,
        'phone'    => $faker->phoneNumber,
        'logo'     => null,
        'facebook' => null,
        'twitter'  => null,
    ];
});
