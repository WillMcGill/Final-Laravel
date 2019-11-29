
<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\UserRoutes;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(UserRoutes::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 20),
        'route_id' => $faker->numberBetween($min = 1, $max = 75),
        'rating' => $faker->numberBetween($min = 1, $max = 5),
        'comments' => $faker->realText($maxNbChars = 200, $indexSize = 2)
        
        
    ];
});