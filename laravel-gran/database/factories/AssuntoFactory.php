<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Assunto;
use Faker\Generator as Faker;

$factory->define(Assunto::class, function (Faker $faker) {

    return [
        'titulo_assunto' => $faker->word,
        'disciplina_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
