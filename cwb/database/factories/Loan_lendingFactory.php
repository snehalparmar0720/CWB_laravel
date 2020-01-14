<?php

use Faker\Generator as Faker;

$factory->define(App\Loan_lending::class, function (Faker $faker) {
    return [
        //
			'loan_division_code' =>$faker->ean8,
			'loan_division_desc' =>$faker->text,
			'lending_program_code' =>$faker->ean8,
			'lending_program_desc' =>$faker->text,

    ];
});
