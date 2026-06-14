<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\PostStatus;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'title' => fake()->sentence(15, true),
            'body' => fake()->paragraphs(10, true),
            'status' => fake()->randomElement(PostStatus::cases()),
            'category_id' => Category::factory(),
        ];
    }
}
