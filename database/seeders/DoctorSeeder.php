<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $doctors = [
            [
                'name' => 'Dr Ibrahim Elmezayen',
                'title' => 'GP, MBBS',
                'image' => 'assets/images/staff/Ibrahim_Elmezayen.webp',
            ],
            [
                'name' => 'Dr Abul Khondaker',
                'title' => 'GP, MBBS, FRACGP',
                'image' => 'assets/images/staff/Abul-Hashem-Khondaker.webp',
            ],
            [
                'name' => 'Dr Htay Thaung',
                'title' => 'GP, MBBS, AMC, FRACGP',
                'image' => 'assets/images/staff/Htay_Thaung.webp',
            ],
            [
                'name' => 'Dr Mohammad Hafiz',
                'title' => 'GP, MBBS, FRACGP',
                'image' => 'assets/images/staff/Mohammad_Hafiz.webp',
            ],
            [
                'name' => 'Dr Farzana Rahman',
                'title' => 'GP, MBBS, AMC, FRACGP',
                'image' => 'assets/images/staff/Farzana_Rahman.webp',
            ],
        ];

        foreach ($doctors as $doctor) {
            Doctor::factory()->create([
                'name' => $doctor['name'],
                'slug' => Str::slug($doctor['name']),
                'title' => $doctor['title'],
                'image' => $doctor['image'],
            ]);
        }
    }
}
