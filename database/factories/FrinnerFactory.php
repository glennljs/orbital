<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Frinner;
use App\User;
use Faker\Generator as Faker;

$factory->define(Frinner::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'taker_id' => User::all()->random()->id,
        'taken' => true,
    ];
});
