<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Speciality::factory(10)->create();
        \App\Models\Image::factory(10)->create();
        \App\Models\Doctor::factory(10)->create();


        // \App\Models\Speciality::factory()->create([
        //     'name' => 'Speciality test',
        //     'description' => 'Descripiton goes here',
        // ]);
    }
}
