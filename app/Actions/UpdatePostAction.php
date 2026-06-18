<?php

declare(strict_types=1);

namespace App\Actions;

use App\Data\PostData;
use App\Enums\PostStatus;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Support\Str;

class UpdatePostAction
{
    public function handle(PostData $data, Post $post): Post
    {
        $post->update([
            'title' => $data->title,
            'slug' => Str::slug($data->title),
            'body' => $data->body,
            'status' => $data->status,
            'thumbnail' => PostService::createThumbnail($data->body),
        ]);

        return $post;
    }
}
