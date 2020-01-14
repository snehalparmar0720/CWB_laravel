<?php

use Faker\Generator as Faker;

$factory->define(App\Review::class, function (Faker $faker) {
    return [
			'address_review'=>$faker->word,
			'physical_date_review'=>$faker->word,
			'physical_reviewed_by'=>$faker->word,
			'physical_qa_by'=>$faker->word,
			'physical_qa_note'=>$faker->word,
			'electronic_qa_by'=>$faker->word,
			'electronic_qa_note'=>$faker->word,
			'electronic_qa_rating'=>$faker->word,

    ];
});
