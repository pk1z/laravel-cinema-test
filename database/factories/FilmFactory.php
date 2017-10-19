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

$factory->define(App\Films::class, function (Faker $faker) {

    $films = [
        ["Крым",120,"Россия", "http://yunost.su/media/k2/items/cache/6d5bf4e07eae718f41e887df8cb394f7_M.jpg"],
        ["Бегущий по лезвию 2049 в 3Д", 90, "США", "http://yunost.su/media/k2/items/cache/dcaeef4c16b8a8dd2169c4e6191f97b9_M.jpg"],
        ["Жизнь впереди", 110, "Россия", "http://yunost.su/media/k2/items/cache/ad8de5425148aa32777950338f4d11f6_M.jpg"],
        ["My Little Pony в кино", 130, "Германия", "http://yunost.su/media/k2/items/cache/ac3c82d798b804f58491d821c475780a_M.jpg"],
        ["Салют - 7 в 3Д", 180, "Россия", "http://yunost.su/media/k2/items/cache/6dc6fb6df728ae7dd216f54153f14935_M.jpg"]
    ];

    return [
        'title' => $films[random_int(0,4)][0] . str_random(5),
        'duration' => $films[random_int(0,4)][1],
        'country' => $films[random_int(0,4)][2],
        'posterUrl' => $films[random_int(0,4)][3],
    ];
});