<?php

use Illuminate\Database\Seeder;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /*DB::table('regions')->insert([
            'region_name' => str_random(10),
            'region_code' => str_random(10).'@gmail.com'
        ]);*/

         \App\Region::insert([
            'region_name' => 'PRAIRIE',
            'region_code' => 'PR'
        ]);

        \App\Region::insert([
            'region_name' => 'NORTHERN AB',
            'region_code' => 'NA'
        ]);

        \App\Region::insert([
            'region_name' => 'British Columbia',
            'region_code' => 'BC'
        ]);

        \App\Region::insert([
            'region_name' => 'Corporate Office',
            'region_code' => 'CO'
        ]);

        \App\Region::insert([
            'region_name' => 'Other Line Of Business',
            'region_code' => 'OLB'
        ]);

        \App\Region::insert([
            'region_name' => 'EFG',
            'region_code' => 'EFG'
        ]);
    }
}
