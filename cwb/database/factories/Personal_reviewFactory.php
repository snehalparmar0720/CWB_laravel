<?php

use Faker\Generator as Faker;

$factory->define(App\Personal_review::class, function (Faker $faker) {
    return [
			'id_review' => $faker->word,
			'noc_r' => $faker->word,
			'occupation_review' => $faker->word,
			'pefp_review' => $faker->word,
			'pep_review' => $faker->word,
			'third_party' => $faker->word,
			'intended_use' => $faker->word,
			'anticipated_acct_activities' => $faker->word,
			'physical_file_review' => $faker->word,
			'filenet_wave' => $faker->word,
			'date_sent' => $faker->date($format = 'Y-m-d', $max = 'now'),
			'date_received' => $faker->date($format = 'Y-m-d', $max = 'now'),
			'br_note' => $faker->word,
			'physical_deficient' => $faker->word,

    ];
});
