<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfessorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('professors')->insert([
            [
                'nombre' => 'Juan Pérez',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'María González',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Carlos López',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Laura Fernández',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Ana Martínez',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
