<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parents = Service::factory(5)->create([
            'parent_id' => null,
        ]);

        foreach ($parents as $parent) {
            $frequency = fake()->numberBetween(3, 7);
            Service::factory($frequency)->create([
                'parent_id' => $parent->id,
            ]);
        }
    }
}
