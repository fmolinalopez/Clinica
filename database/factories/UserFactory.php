<?php

use Faker\Generator as Faker;
use Carbon\Carbon as Carbon;

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

$factory->define(App\User::class, function (Faker $faker) {
    $esMedico = $faker->boolean;
    if (!$esMedico){
        return [
        'esMedico' => $esMedico,
        'name' => $name = $faker->firstName,
        'lastName' => $lastName = $faker->lastName,
        'userName' => strtolower($name) . "." . strtolower($lastName),
        'email' => strtolower($name) . "." . strtolower($lastName) . "@" . $faker->freeEmailDomain,
        'avatar' => 'http://sprintresources.com/wp-content/uploads/2016/12/icon-user.png',
        'num_sanitario' => $faker->randomNumber(9) . generarUltimosNumerosSanitarios(),
        'birthdate' => $faker->date('Y-m-d'),
        'dni' => $faker->randomNumber(8) . generarLetra(),
        'movil' => $faker->e164PhoneNumber,
        'website' => $faker->url,
        'about' => $faker->sentence,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        ];
    }else{
        return [
            'esMedico' => $esMedico,
            'name' => $name = $faker->firstName,
            'lastName' => $lastName = $faker->lastName,
            'userName' => strtolower($name) . "." . strtolower($lastName),
            'email' => strtolower($name) . "." . strtolower($lastName) . "@" . $faker->freeEmailDomain,
            'avatar' => 'http://sprintresources.com/wp-content/uploads/2016/12/icon-user.png',
            'num_colegiado' => $faker->randomNumber(9) . generarUltimosNumerosSanitarios(),
            'especialidad' => $faker->sentence,
            'movil' => $faker->e164PhoneNumber,
            'website' => $faker->url,
            'about' => $faker->sentence,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
        ];
    }
});

function generarLetra(){
    $num = mt_rand(1,10);
    switch ($num){
        case 1:
            return 'A';
        case 2:
            return 'B';
        case 3:
            return 'C';
        case 4:
            return 'D';
        case 5:
            return 'E';
        case 6:
            return 'F';
        case 7:
            return 'G';
        case 8:
            return 'H';
        case 9:
            return 'I';
        case 10:
            return 'J';
    }
}

function generarUltimosNumerosSanitarios(){
    return mt_rand(10,99);
}