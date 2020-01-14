<?php

use Faker\Generator as Faker;

$factory->define(App\Branch::class, function (Faker $faker) {
    return [
        //
		'branch_name' =>$faker->streetAddress,
		'region_id' => function () {
            	return factory(App\Region::class)->create()->id;
        		},
    ];
});
