<?php

namespace App\Actions;

use App\Data\PostData;
use App\Enums\PostStatus;
use App\Models\Post;
use Illuminate\Support\Str;

class CreatePostAction
{
    public function handle(PostData $data): Post
    {
        return Post::query()->create([
            'title' => $data->title,
            'slug' => Str::slug($data->title),
            'body' => $data->body,
            'status' => PostStatus::DRAFT,
            'category_id' => $data->category_id,
        ]);
    }
}   
