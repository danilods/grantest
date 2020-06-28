<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Questao;
use Faker\Generator as Faker;

$factory->define(Questao::class, function (Faker $faker) {

    return [
        'cod_questao' => $faker->word,
        'enunciado' => $faker->word,
        'modalidade' => $faker->randomDigitNotNull,
        'assunto_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
