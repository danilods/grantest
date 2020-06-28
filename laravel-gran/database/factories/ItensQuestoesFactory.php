<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ItensQuestoes;
use Faker\Generator as Faker;

$factory->define(ItensQuestoes::class, function (Faker $faker) {

    return [
        'descricao_item' => $faker->word,
        'correcao_item' => $faker->word,
        'questao_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
