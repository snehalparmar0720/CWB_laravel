<?php

use Faker\Generator as Faker;

$factory->define(App\Dao::class, function (Faker $faker) {
    return [

			'acct_dao_number'=>$faker->ean8,
			'acct_dao_fullname'=>$faker->name,
			'account_dao_branch_desc'=>$faker->text,
			'account_dao_dept'=>$faker->word,
			'cust_dao_number'=>$faker->ean8,
			'cust_dao_fullname'=>$faker->name,
			'cust_dao_branch_desc'=>$faker->word,
			'cust_dao_dept'=>$faker->text,
			'efg_dao'=>$faker->ean8,
        //
    ];
});
