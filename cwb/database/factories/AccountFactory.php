<?php

use Faker\Generator as Faker;

$factory->define(App\Account::class, function (Faker $faker) {
    return [
        //
			'cif' => $faker->unique()->ean8,
			'account_status_desc' => $faker->word,
			'account_number' => $faker->unique()->ean8,
			'product_desc' => $faker->sentence,
			'account_open_date' => $faker->date($format = 'Y-m-d', $max = 'now'),

    ];
});
