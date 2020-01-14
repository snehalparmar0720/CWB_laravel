<?php

use Faker\Generator as Faker;

$factory->define(App\Non_personal::class, function (Faker $faker) {
    return [
			'cif_status_desc' => $faker->word,
			'cif' => $faker->ean8,
			'naics_code' => $faker->ean8,
			'naics_name' => $faker->word,
			'naics_sector_name' => $faker->word,
			'naics_internal_sector_name' => $faker->word,
			'naics_lookup' => $faker->word,
			'naics_prohibited' => $faker->word,
			'name_holding_but_not_holding_company' => $faker->word,
			'naics_def_comm' => $faker->word,
			'accepts_donations_flag' => $faker->word,
			'registered_charity_flag' => $faker->word,
			'charity_def_comm' => $faker->word,
			'review_eligible' => $faker->word,
			'duplicate_cif_different_branches' => $faker->word,
			'same_name_different_cif' => $faker->word,
			'at_least_1' => $faker->word,

    ];
});
