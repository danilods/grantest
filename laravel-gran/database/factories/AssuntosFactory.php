<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Assuntos;
use Faker\Generator as Faker;

$factory->define(Assuntos::class, function (Faker $faker) {

    return [
        'titulo_assunto' => $faker->word,
        'raiz_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
