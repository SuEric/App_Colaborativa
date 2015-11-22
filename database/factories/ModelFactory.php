<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/*
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
*/

$factory->define(App\Usuario::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->name,
    ];
});

$factory->define(App\Rol::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence($nbWords = 2),
        'descripcion' => $faker->realText($maxNbChars = 50, $indexSize = 2),
        'privilegio' => $faker->numberBetween($min = 1, $max = 3),
    ];
});

$factory->define(App\Tarea::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence($nbWords = 2),
        'descripcion' => $faker->realText($maxNbChars = 50, $indexSize = 2),
        'tipo' => $faker->numberBetween($min = 1, $max = 4),
    ];
});

$factory->define(App\Fase::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence($nbWords = 2),
        'descripcion' => $faker->realText($maxNbChars = 50, $indexSize = 2),
    ];
});

$factory->define(App\Actividad::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence($nbWords = 2),
        'descripcion' => $faker->realText($maxNbChars = 50, $indexSize = 2),
    ];
});

$factory->define(App\Recurso::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence($nbWords = 2),
        'descripcion' => $faker->realText($maxNbChars = 50, $indexSize = 2),
    ];
});

$factory->define(App\Historial::class, function (Faker\Generator $faker) {
    return [
        'fecha' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
    ];
});