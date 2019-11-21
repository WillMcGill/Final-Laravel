<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Routes;
use Faker\Generator as Faker;


$factory->define(Routes::class, function (Faker $faker) {
    return [
        'wall_location' => $faker->unique()->numberBetween($min = 1, $max = 75),
        'type' => $faker->randomElement(['Top Rope', 'Lead', 'Auto-Belay']),
        'difficulty' => $faker->randomElement(['5.8', '5.9', '5.10', '5.11', '5.12', '5.13']),
        'set_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'expire_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'active' => $faker->boolean(),
    ];
});
