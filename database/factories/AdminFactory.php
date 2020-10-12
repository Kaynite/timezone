<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

$factory->define(Admin::class, function (Faker $faker) {
    return [
        'username' => 'Kay',
        'email' => 'admin@admin.com',
        'email_verified_at' => now(),
        'password' => Hash::make(123456789),
        'remember_token' => Str::random(10),
    ];
});
