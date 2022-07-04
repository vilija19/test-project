<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = \Faker\Factory::create();

        for ($i=0; $i < 20; $i++) { 
            DB::table('users')->insert([
                'name' => $fake->name(),
                'email'     => $fake->email(),
                'email_verified_at'    => now(),
                'password' => $fake->password(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
