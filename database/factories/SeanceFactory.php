<?php

use Faker\Generator as Faker;

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

$factory->define(App\Seance::class, function (Faker $faker) {

    return [
        'start' => $faker->dateTimeBetween('-1 day', '+1 day'),
        'film_id' => App\Films::all()->random()->id,
        'room_id' => App\Room::all()->random()->id,
    ];
});
