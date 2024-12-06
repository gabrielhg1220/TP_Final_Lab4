<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Se generan 20 estudiante.
        foreach (range(1,15) as $index) {
            DB::table('students')->insert([
                'nombre' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'created_at' => $faker->dateTimeBetween('-1 year','now'), // Fecha de lac reacion entre el año anterior y ahora.
                'updated_at' => now(),
            ]);
        }
    }
}
