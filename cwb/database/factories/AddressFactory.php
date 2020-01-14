<?php

use Faker\Generator as Faker;


$factory->define(App\Address::class, function (Faker $faker) {

    return [
        //
        'cif' => $faker->unique()->ean8,
		'line_1_address' => $faker->secondaryAddress,
		'line_2_address' => $faker->streetAddress,
		'customer_city_name' => $faker->city,
		'postal_code' => $faker->postcode,
		'province_state_code' => $faker->state,
		'address_country_code' => $faker->country,
		'line_1_address_legal' => $faker->secondaryAddress,
		'line_2_address_legal' => $faker->streetAddress,
		'customer_city_name_legal' => $faker->city,
		'postal_code_legal' => $faker->postcode,
		'province_state_code_legal' => $faker->state,
		'address_country_code_legal' => $faker->country,
    ];
});

