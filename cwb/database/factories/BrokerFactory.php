<?php

use Faker\Generator as Faker;

$factory->define(App\Broker::class, function (Faker $faker) {
    return [
        //
			'broker_number'=>$faker->ean8,
			'broker_name'=>$faker->name,
    ];
});
