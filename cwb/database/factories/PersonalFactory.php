<?php

use Faker\Generator as Faker;

$factory->define(App\Personal::class, function (Faker $faker) {
    return [
        //
			'cif_status_desc' => $faker->word,
			'cif' => $faker->ean8,
			'after_december_17' => $faker->word,
			'youth' => $faker->randomDigit,
			'sin' => $faker->ean8,
			'review_eligible' => $faker->word,
			'duplicate_cif_different_branches' => $faker->word,
			'same_name_different_cif' => $faker->word,
			'at_least_1' => $faker->randomDigit,
			'poa' => $faker->word,
			'residence_id' => function () {
            	return factory(App\Residence::class)->create()->id;
        		},
        	'review_id' => function () {
            	return factory(App\Review::class)->create()->id;
        		},
        	'personal_review_id' => function () {
            	return factory(App\Personal_review::class)->create()->id;
        		},
        	'third_party_id' => function () {
            	return factory(App\Third_party::class)->create()->id;
        		},
        	'average_money_id' => function () {
            	return factory(App\Average_money::class)->create()->id;
        		},
        	'intended_use_id' => function () {
            	return factory(App\Intended_use::class)->create()->id;
        		},
        	'pefp_pep_id' => function () {
            	return factory(App\Pefp_Pep::class)->create()->id;
        		},
        	'employer_id' => function () {
            	return factory(App\Employer::class)->create()->id;
        		},
        	'occupation_id' => function () {
            	return factory(App\Occupation::class)->create()->id;
        		},
        	'noc_id' => function () {
            	return factory(App\Noc::class)->create()->id;
        		},
        	'identification_id' => function () {
            	return factory(App\Identification::class)->create()->id;
        		},
        
    ];
});
