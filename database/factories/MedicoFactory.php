<?php

use Faker\Generator as Faker;
use Carbon\Carbon as Carbon;

$factory->define(App\Medico::class, function (Faker $faker) {

    $time1 = Carbon::createFromTimestamp($faker->dateTimeThisDecade->getTimestamp());
    $time2 = Carbon::createFromTimestamp($faker->dateTimeThisDecade->getTimestamp());

    //https://instrumentalfx.co/wp-content/uploads/2018/01/Uganda-Knuckles-300x300.jpg

    return [
        'imagen'    => 'https://picsum.photos/300/300/?image=' . mt_rand(0,1000),
        'nombre'     => $name = $faker->name,
        'email'      => str_replace('\'', '', (str_replace(' ', '', strtolower($name)))) . '@' . $faker->freeEmailDomain,
        'especialidad' => $faker->sentence,
        'clinicas' => $faker->paragraph,
        'num_colegiado' => $faker->unique()->numberBetween(10000, 99999),
        'curriculum' => $faker->text,
        'favoritos' => $favs = $faker->numberBetween(1, 99),
        'extra' => $faker->text,
        'destacado' => ($favs>=50)?true:false,
        'created_at' => ($time1 < $time2) ? $time1 : $time2,
        'updated_at' => ($time1 > $time2) ? $time1 : $time2, // Un médico no puede ser modificado antes de su creacion
    ];
});
