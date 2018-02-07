<?php

use Faker\Generator as Faker;

$factory->define(\App\Clinica::class, function (Faker $faker) {
    return [
        'nombre' => $name = $faker->sentence,
        'direccion' => $faker->sentence,
        'email' => str_slug($name, "-") . "@" . $faker->freeEmailDomain,
        'movil' => $faker->e164PhoneNumber,
        'web' => $faker->url,
        'about' => $faker->sentence,
    ];
});
