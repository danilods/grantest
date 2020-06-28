<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Disciplina;
use Faker\Generator as Faker;

$factory->define(Disciplina::class, function (Faker $faker) {

    return [
        'nome_disciplina' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
