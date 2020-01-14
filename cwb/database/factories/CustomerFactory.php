<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
			'customer_name' => $faker->name,
			'alternate_name' => $faker->name,
			'trade_name' => $faker->name,
			'customer_birth_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
			'deceased_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
			'customer_open_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
			'cif' => $faker->ean8,
			'customer_industry_code' => $faker->word,
			'customer_industry_desc' => $faker->word,
			'customer_sector_desc' => $faker->word,
			'calendar_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
			'quarter' => $faker->word,
			'posting_restriction' => $faker->word,
			'efg_flag' => $faker->word,
			'rolling_gic' => $faker->word,
			'exempect_deceased' => $faker->word,
			'branch_id' => function () {
            	return factory(App\Branch::class)->create()->id;
        		},
			'account_id' => function () {
            	return factory(App\Account::class)->create()->id;
        		},
        	'address_id' => function () {
            	return factory(App\Address::class)->create()->id;
        		},
        	'dao_id' => function () {
            	return factory(App\Dao::class)->create()->id;
        		},
        	'broker_id' => function () {
            	return factory(App\Broker::class)->create()->id;
        		},
        	'loan_lending_id' => function () {
            	return factory(App\Loan_lending::class)->create()->id;
        		},
        	'metrics_id' => function () {
            	return factory(App\Metric::class)->create()->id;
        		},
        	'account_type_id' => function () {
            	return factory(App\Personal::class)->create()->id;
        		},
        	
    ];
});
