<?php

use Faker\Generator as Faker;

$factory->define(App\Metric::class, function (Faker $faker) {
    return [
			'joint_total_count' =>$faker->randomDigit,
			'primary_count' =>$faker->randomDigit,
			'joint_joint_count' =>$faker->randomDigit,
			'joint_singer_count' =>$faker->randomDigit,
			'joint_power_of_attorney_count' =>$faker->randomDigit,
			'joint_executor_count' =>$faker->randomDigit,
			'joint_trustee_count' =>$faker->randomDigit,
			'joint_tenants_in_common_count' =>$faker->randomDigit,
			'joint_guarantor_count' =>$faker->randomDigit,
			'joint_third_party_count' =>$faker->randomDigit,
			'joint_other_count' =>$faker->randomDigit,
			'total_account_count' =>$faker->randomDigit,
			'total_deposit_count' =>$faker->randomDigit,
			'total_demand_account_count' =>$faker->randomDigit,
			'total_loan_count' =>$faker->randomDigit,
			'total_term_deposit_count' =>$faker->randomDigit,
			'cif_count' =>$faker->randomDigit,
			'efg_cif_count' =>$faker->randomDigit,
			'cif_itf_count' =>$faker->randomDigit,
			'account_count' =>$faker->randomDigit,
			'itf_account_count' =>$faker->randomDigit,

    ];
});
