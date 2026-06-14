<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $name = fake()->name(),
            'slug' => Str::slug($name),
            'email' => fake()->unique()->safeEmail(),
            'title' => fake()->jobTitle(),
            'mobile_phone' => fake()->phoneNumber(),
            'office_phone' => fake()->phoneNumber(),
            'bio' => fake()->paragraph(),
            'image' => fake()->imageUrl(),
            'education' => fake()->sentence(),
            'board_certifications' => fake()->sentence(),
            'field_of_expertise' => fake()->sentence(),
            'years_of_experience' => fake()->randomNumber(2),
            'quote' => fake()->sentence(),
        ];
    }
}
