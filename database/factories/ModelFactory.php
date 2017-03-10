<?php

use SGH\Encuesta;
use SGH\Pregunta;
use SGH\ItemPreg;
use SGH\Respuesta;

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

$factory->define(SGH\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'username' => $faker->userName,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'role' => 'editor',
        'USER_creadopor' => 'SYSTEM',
        'USER_fechacreado' => \Carbon\Carbon::now()->toDateTimeString(),
    ];
});

$factory->define(Encuesta::class, function (Faker\Generator $faker) {
    return [
        'ENCU_titulo' => str_limit($faker->paragraph(1), 30),
        'ENCU_descripcion' => str_limit($faker->paragraph, 230),
        'ESEN_id' => rand(1,4),
        'ENCU_fechavigencia' => $faker->dateTime(),
        'ENCU_creadopor' => 'editor2',
        'ENCU_plantilla' => false,
        'ENCU_plantillapublica' => false,
    ];
});

$factory->define(Pregunta::class, function (Faker\Generator $faker) {
    return [
        'PREG_texto' => '¿'.$faker->paragraph(1).'?',
        'TIPR_id' => rand(1,4),
        'PREG_creadopor' => 'admin',
    ];
});


$factory->define(ItemPreg::class, function (Faker\Generator $faker) {
    return [
        'ITPR_texto' => $faker->paragraph,
        'ITPR_creadopor' => 'admin',
    ];
});

$factory->define(Respuesta::class, function (Faker\Generator $faker) {
    return [
        'RESP_valor' => (Integer)($faker->numberBetween($min = 1, $max = 5)) ,
        'RESP_creadopor' => 'pepe',
    ];
});
