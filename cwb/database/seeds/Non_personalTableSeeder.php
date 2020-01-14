<?php

use Illuminate\Database\Seeder;

class Non_personalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         factory('App\Non_personal', 10)->create();

    }
}
