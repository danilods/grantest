<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProgramaEstudo;
use Faker\Generator as Faker;

$factory->define(ProgramaEstudo::class, function (Faker $faker) {

    return [
        'nome_programa' => $faker->word,
        'foco_programa' => $faker->word,
        'meta_diaria' => $faker->randomDigitNotNull,
        'banca_id' => $faker->word,
        'orgao_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
