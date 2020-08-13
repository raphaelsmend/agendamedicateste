<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Agendamento;
use Faker\Generator as Faker;

$factory->define(Agendamento::class, function (Faker $faker) {

    return [
        'medico_id' => $faker->randomDigitNotNull,
        'paciente_id' => $faker->randomDigitNotNull,
        'datahoraagenda' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
