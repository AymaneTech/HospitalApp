<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Medicine;
use App\Models\Speciality;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Speciality::factory(10)
            ->has(Medicine::factory()
                ->count(2))
            ->create();

        Doctor::factory(10)->create();


        Admin::factory()->create([
            'name' => 'Aymane Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make("123"),
        ]);
    }
}
