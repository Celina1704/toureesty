<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for($i= 0; $i < 5; $i++){
            DB::table('users')->insert([
                'name'=>$faker->name,
                'phone'=>$faker->phoneNumber,
                'email'=>$faker->email,
                'birthday'=>$faker->date,
                'gender'=>$faker->randomElement(['Male', 'Female']),
                'email_verified_at' => Carbon::now(),
                'password' => '123',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
