<?php

use Faker\Generator as Faker;

$factory->define(App\Non_personal_review::class, function (Faker $faker) {
    return [
       
			'naics_r' => $faker->word,
			'charity_r' => $faker->word,
			'third_party' => $faker->word,
			'intended_use' => $faker->word,
			'anticipated_acct_activities' => $faker->word,
			'ownership_structure' => $faker->word,
			'owners_on_system' => $faker->word,
			'confirmed_existence' => $faker->word,
			'record_of_directors' => $faker->word,
			'directors_on_system' => $faker->word,
			'signers_review' => $faker->word,
			'physical_file_review' => $faker->word,
			'filenet_wave' => $faker->word,
			'date_sent' => $faker->date($format = 'Y-m-d', $max = 'now'),
			'date_received' => $faker->date($format = 'Y-m-d', $max = 'now'),
			'br_note' => $faker->word,

    ];
});
