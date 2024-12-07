<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([
            ['nombre' => 'Fisica 101', 'subject_id' => 2],
            ['nombre'=> 'Quimica 101', 'subject_id' => 3],
        ]);
    }
}
