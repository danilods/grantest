<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Questoes;
use App\Models\Bancas;
use App\Models\Orgaos;
use App\Models\Assuntos;


use Faker\Generator as Faker;

$factory->define(Questoes::class, function (Faker $faker) {

    return [
        'cod_questao' => $faker->word,
        'enunciado' => $faker->word,
        'modalidade' => $faker->randomDigitNotNull,
        'ano' => $faker->word,
        'assunto_id' => $faker->word,
        'banca_id' => $faker->word,
        'orgao_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
