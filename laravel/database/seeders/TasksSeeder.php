<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $fake = \Faker\Factory::create('en_US');

        for ($i=0; $i < 20; $i++) { 
            DB::table('tasks')->insert([
                'creator_id' => random_int(1, 19),
                'title'     => $fake->sentence(),
                'content'    => $fake->text(),
                'status_id' => random_int(7, 9),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
