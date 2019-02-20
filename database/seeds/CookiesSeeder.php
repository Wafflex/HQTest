<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CookiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < 50; $i++) {
            \DB::table('cookies')->insert(array(
                   'nombre' => 'Cookie ' . $faker->firstNameFemale . ' ' . $faker->lastName,
                   'description'  => $faker->randomElement(['chocolate','vainilla','cheesecake']),
                   'created_at' => date('Y-m-d H:m:s'),
                   'updated_at' => date('Y-m-d H:m:s')
            ));
        }
    }
}
