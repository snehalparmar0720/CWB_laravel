<?php

use Faker\Generator as Faker;

$factory->define(App\Employer::class, function (Faker $faker) {
    return [
			'customer_employer_business' =>$faker->word,
			'customer_employer_name' =>$faker->name,
			'customer_employer_address' =>$faker->address,
			'employer_def_comm' =>$faker->word,
			'customer_employer_name_loan' =>$faker->name,
			'customer_employer_address_loan' =>$faker->address,

    ];
});
