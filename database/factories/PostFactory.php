<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\PostStatus;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $title = fake()->sentence(15, true),
            'slug' => Str::slug($title),
            'body' => fake()->paragraphs(10, true),
            'status' => fake()->randomElement(PostStatus::cases()),
            'thumbnail' => fake()->imageUrl(),
        ];
    }
}
