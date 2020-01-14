<?php

use Faker\Generator as Faker;

$factory->define(App\Identification::class, function (Faker $faker) {
    return [
			'count_id_digit' => $faker->randomDigit,
			'face_2_face' => $faker->word,
			'agent_affiliate_validation' => $faker->word,
			'matching_criteria' => $faker->word,
			'source_of_information' => $faker->word,
			'customer_id_number' => $faker->randomDigit,
			'customer_id_number_type_desc' => $faker->word,
			'expiry_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
			'customer_identification_country_of_issue_desc' => $faker->word,
			'customer_identification_place_of_issue_desc' => $faker->word,
			'cwb_identify' => $faker->word,
			'employee_verification_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
			'agent_affiliate_entity' => $faker->word,
			'agent_affiliate_name' => $faker->name,
			'agent_affiliate_verification_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
			'count_id_digit2' => $faker->randomDigit,
			'face_2_face2' => $faker->word,
			'agent_affiliate_validation2' => $faker->word,
			'matching_criteria2' => $faker->word,
			'source_of_information2' => $faker->word,
			'customer_id_number2' => $faker->randomDigit,
			'customer_id_number_type_desc2' => $faker->word,
			'expiry_date2' => $faker->date($format = 'Y-m-d', $max = 'now'),
			'customer_identification_country_of_issue_desc2' => $faker->word,
			'customer_identification_place_of_issue_desc2' => $faker->word,
			'cwb_identify2' => $faker->word,
			'employee_verification_date2' => $faker->date($format = 'Y-m-d', $max = 'now'),
			'agent_affiliate_entity2' => $faker->word,
			'agent_affiliate_name2' => $faker->name,
			'agent_affiliate_verification_date2' => $faker->date($format = 'Y-m-d', $max = 'now'),

    ];
});
