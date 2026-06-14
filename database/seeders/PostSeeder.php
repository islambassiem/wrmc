<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\PostStatus;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory(20)->create([
            'status' => fake()->randomElement(array_column(PostStatus::cases(), 'value')),
        ]);
    }
}
