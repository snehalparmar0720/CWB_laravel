<?php

use Faker\Generator as Faker;

$factory->define(App\Noc::class, function (Faker $faker) {
    return [
        //
			'noc_code' =>$faker->word,
			'noc_desc' =>$faker->word,
    ];
});
