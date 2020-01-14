<?php

use Faker\Generator as Faker;

$factory->define(App\Joint_review::class, function (Faker $faker) {
    return [
			'dob_review' => $faker->word,
			'incorrect_signing_authority' => $faker->word,
			'role_review' => $faker->word,
			'physical_deficient' => $faker->word,
			'id_review' => $faker->word,
			'noc_r' => $faker->word,
			'occupation_review' => $faker->word,
			'employers_name_personal_loan' => $faker->word,
			'employers_address_personal_loan' => $faker->word,
			'pefp_review' => $faker->word,
			'pep_review' => $faker->word,
			'optimum_physical_ids' => $faker->word,
			'physical_review' => $faker->word,

    ];
});
