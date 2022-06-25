<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class LabelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('labels')->insert([
            'name' => 'bug',
            'color' => 'yellow',
            'created_at' => now(),
        ]);

        DB::table('labels')->insert([
            'name' => 'feature',
            'color' => 'blue',
            'created_at' => now(),
        ]);

        DB::table('labels')->insert([
            'name' => 'urgent',
            'color' => 'red',
            'created_at' => now(),
        ]);
    }
}
