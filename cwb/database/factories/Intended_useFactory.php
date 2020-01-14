<?php

use Faker\Generator as Faker;

$factory->define(App\Intended_use::class, function (Faker $faker) {
    return [
        //
			'category_code' =>$faker->ean8,
			'intended_use_code' =>$faker->ean8,
			'intended_use_desc' =>$faker->word,
			'intended_use_other_desc' =>$faker->word,
    ];
});
