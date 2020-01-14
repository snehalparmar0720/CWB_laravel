<?php

use Faker\Generator as Faker;

$factory->define(App\Pefp_Pep::class, function (Faker $faker) {
    return [
			'pefp_flag'=>$faker->word,
			'pep_flag'=>$faker->word,

    ];
});
