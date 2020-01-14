<?php

use Faker\Generator as Faker;

$factory->define(App\Residence::class, function (Faker $faker) {
    return [
        //
			'country_of_residence_desc' =>$faker->country,
			'cp_address' =>$faker->streetAddress,
			'cp_city' =>$faker->city,
			'cp_postal_code' =>$faker->postcode,
			'cp_province' =>$faker->state,
			'cp_country' =>$faker->country,

    ];
});
