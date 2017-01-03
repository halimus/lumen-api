<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        //delete users table records
        DB::table('users')->delete();
        //insert some dummy records
        DB::table('users')->insert(array(
            array('user_id' => 1, 'first_name' => 'Halim', 'last_name' => 'Lardjane' , 'phone' => '123-456-7890', 'email' => 'halim@domaine.com', 'password' => bcrypt('1234')),
            array('user_id' => 2, 'first_name' => 'Sara', 'last_name' => 'Taylor' , 'phone' => null, 'email' => 'taylor@domaine.com', 'password' => bcrypt('1234'))
        ));
    }

}
