<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::insert([
            'name' => 'Snehal Parmar',
            'email' => 'snehalparmar272@gmail.com',
            'role_id' => 1,
            'password' => bcrypt('snehal123')
        ]);
    }
}
