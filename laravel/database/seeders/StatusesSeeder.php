<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'name' => 'To Do',
            'created_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'name' => 'In Progress',
            'created_at' => now(),
        ]);

        DB::table('statuses')->insert([
            'name' => 'Done',
            'created_at' => now(),
        ]);
    }
}
