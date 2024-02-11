<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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


        \App\Models\Admin::factory()->create([
            'name' => 'Aymane Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make("123"),
        ]);
    }
}
