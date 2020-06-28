<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Bancas;
use Faker\Generator as Faker;

$factory->define(Bancas::class, function (Faker $faker) {

    return [
        'nome_banca' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
