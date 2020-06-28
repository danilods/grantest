<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BancaOrgao;
use Faker\Generator as Faker;

$factory->define(BancaOrgao::class, function (Faker $faker) {

    return [
        'banca_id' => $faker->word,
        'orgao_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
