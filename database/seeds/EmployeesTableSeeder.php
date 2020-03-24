<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create('en_IN');
    	foreach(range(1,20) as $index){
	    	$employee = \App\student::insert([
                'firstname' => $faker->firstname,
	            'lastname' => $faker->lastname,
	            'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'username' => $faker->username,
                'password' => bcrypt('secret'),
	            'email' => $faker->unique()->email,
	        ]);
	    }
    }
}
