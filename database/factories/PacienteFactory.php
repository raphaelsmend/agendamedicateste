<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Paciente;
use Faker\Generator as Faker;

$factory->define(Paciente::class, function (Faker $faker) {

    return [
        'nome' => $faker->word,
        'datanascimento' => $faker->word,
        'genero' => $faker->word,
        'telefone1' => $faker->word,
        'telefone2' => $faker->word,
        'cep' => $faker->word,
        'endereco' => $faker->word,
        'numero' => $faker->randomDigitNotNull,
        'complemento' => $faker->word,
        'bairro' => $faker->word,
        'cidade' => $faker->word,
        'uf' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
