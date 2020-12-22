<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use Faker\Factory as Faker;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,20) as $index){

            Student::insert([
                'firstname' =>$faker->name(),
                'lastname' => $faker->name(),
                'regno' => $faker->bankAccountNumber,
                ]);
            }
        }
}
