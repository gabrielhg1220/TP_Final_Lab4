<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subjects')->insert([
            ['nombre' => 'Matematicas'],
            ['nombre' => 'Fisica'],
            ['nombre' => 'Quimica'],
            ['nombre' => 'Biologia'],
        ]);
    }
}
