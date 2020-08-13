<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Medicos;
use Faker\Generator as Faker;

$factory->define(Medicos::class, function (Faker $faker) {

    return [
        'nome' => $faker->randomDigitNotNull,
        'crm' => $faker->randomDigitNotNull,
        'especialidade_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
