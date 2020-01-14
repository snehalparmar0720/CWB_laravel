<?php

use Faker\Generator as Faker;

$factory->define(App\Third_party::class, function (Faker $faker) {
    return [
        //
			'third_party_flag' =>$faker->word,
			'third_party_def_comm' =>$faker->text,

    ];
});
