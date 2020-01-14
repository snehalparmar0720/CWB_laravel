<?php

use Faker\Generator as Faker;

$factory->define(App\Average_money::class, function (Faker $faker) {
    return [
        'avg_mo_cash_dep' =>$faker->ean8,
		'avg_mo_chq_dep' =>$faker->ean8,
		'avg_mo_inc_wire' =>$faker->ean8,
		'avg_mo_out_wire' =>$faker->ean8,
    ];
});
