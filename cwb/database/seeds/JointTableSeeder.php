<?php

use Illuminate\Database\Seeder;

class JointTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         factory('App\Joint', 10)->create();

    }
}
