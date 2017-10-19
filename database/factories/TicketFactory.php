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

$factory->define(App\Ticket::class, function (Faker $faker) {

    // ряд и место уникальны относительно зала, в котором будет сеанс
    return [
        'secret' => str_random(10),
        'colNumber' => random_int(1, 5),
        'rowNumber' => random_int(1, 5),
        'seance_id' => App\Seance::all()->random()->id,
    ];
});
