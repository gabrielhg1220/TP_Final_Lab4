<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('commissions')->insert([
            [
                'aula' => 'Aula 101',
                'horario' => '08:00:00',
                'course_id' => 1, // ID de un curso existente
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'aula' => 'Aula 102',
                'horario' => '08:00:00',
                'course_id' => 2, // ID de otro curso existente
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'aula' => 'Aula 103',
                'horario' => '11:00:00',
                'course_id' => 2, // ID de otro curso existente
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
