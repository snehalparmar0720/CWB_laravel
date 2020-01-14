<?php

use Faker\Generator as Faker;

$factory->define(App\Joint::class, function (Faker $faker) {
    return [
			'joint_customer_status_desc'=> $faker->word,
			'joint_cif'=> $faker->ean8,
			'joint_customer_name'=> $faker->word,
			'joint_type_desc'=> $faker->word,
			'type_def_comm'=> $faker->word,
			'multiple_cifs'=> $faker->word,
			'selected_for_role_review'=> $faker->word,
			'cif_relation'=> $faker->word,
			'personal_cif_role'=> $faker->word,
			'correct_role'=> $faker->word,
			'highest_aml_requirement_role'=> $faker->word,
			'dob_def_comm'=> $faker->word,
			'role_def_comm'=> $faker->word,
			'joint_office_phone'=> $faker->word,
			'after_december_17'=> $faker->word,
			'youth'=> $faker->word,
			'sin'=> $faker->word,

    ];
});
