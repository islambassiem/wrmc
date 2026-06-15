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
                'image' => 'doctors/'.Str::slug('Dr Ibrahim Elmezayen').'.webp',
                'resignation_date' => null,
            ],
            [
                'name' => 'Dr Abul Khondaker',
                'title' => 'GP, MBBS, FRACGP',
                'image' => 'doctors/'.Str::slug('Dr Abul Khondaker').'.webp',
                'resignation_date' => null,
            ],
            [
                'name' => 'Dr Htay Thaung',
                'title' => 'GP, MBBS, AMC, FRACGP',
                'image' => 'doctors/'.Str::slug('Dr Htay Thaung').'.webp',
                'resignation_date' => null,
            ],
            [
                'name' => 'Dr Mohammad Hafiz',
                'title' => 'GP, MBBS, FRACGP',
                'image' => 'doctors/'.Str::slug('Dr Mohammad Hafiz').'.webp',
                'resignation_date' => null,
            ],
            [
                'name' => 'Dr Farzana Rahman',
                'title' => 'GP, MBBS, AMC, FRACGP',
                'image' => 'doctors/'.Str::slug('Dr Farzana Rahman').'.webp',
                'resignation_date' => null,
            ],
        ];

        foreach ($doctors as $doctor) {
            Doctor::factory()->create([
                'name' => $doctor['name'],
                'slug' => Str::slug($doctor['name']),
                'title' => $doctor['title'],
                'image' => $doctor['image'],
                'resignation_date' => $doctor['resignation_date'],
            ]);
        }
    }
}
