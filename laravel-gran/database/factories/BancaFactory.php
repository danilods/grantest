<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Banca;
use Faker\Generator as Faker;

$factory->define(Banca::class, function (Faker $faker) {

    return [
        'nome_banca' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
