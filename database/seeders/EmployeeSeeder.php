<?php

namespace Database\Seeders;

use App\Models\EmployeeModel;
use Illuminate\Database\Seeder;
use Faker\Factory as Facker;
use Illuminate\Support\Str;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Facker::create();
        foreach (range(1, 20) as $val) {
            $emp = new EmployeeModel;

            $emp->name = $faker->name();
            $emp->email = $faker->email();
            $emp->phone = $faker->phoneNumber();
            $emp->mark = Str::random(5);
            $emp->save();
        }
    }
}
