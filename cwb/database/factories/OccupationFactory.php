<?php

use Faker\Generator as Faker;

$factory->define(App\Occupation::class, function (Faker $faker) {
    return [
			'customer_occupation_desc' =>$faker->word,
			'customer_employment_status_desc' =>$faker->word,

    ];
});
