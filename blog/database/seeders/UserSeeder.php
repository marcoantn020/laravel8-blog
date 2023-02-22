<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(20)->create();
//        $faker = Factory::create('pt_br');
//
//        for($i =0, $max = 20; $i < $max; $i++) {
//            DB::table('users')
//                ->insert([
//                    'firstName' => $faker->firstName,
//                    'lastName' => $faker->lastName,
//                    'email' => $faker->email,
//                    'password' => bcrypt('123456')
//                ]);
//        }
    }
}
