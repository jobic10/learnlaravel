<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $faker = Faker::create();
            foreach(range(1,50) as $index){
                Customer::insert([
                    'name' => $faker->name,
                    'email' => $faker->email,
                    'phone' => $faker->phoneNumber
                ]);
            }
    }
}
