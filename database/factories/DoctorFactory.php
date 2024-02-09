<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Speciality;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = $this->faker;
        $specialities = Speciality::pluck('id')->toArray();

        return [
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'phone' => $faker->phoneNumber,
            'speciality_id' => $faker->randomElement($specialities),
            'password' => bcrypt('password'), // You can adjust the default password as needed
            'email_verified_at' => now(),
            'remember_token' => 1,
        ];
    }
}
