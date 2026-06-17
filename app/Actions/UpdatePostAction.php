<?php

declare(strict_types=1);

namespace App\Actions;

use App\Data\PostData;
use App\Models\Post;

class UpdatePostAction
{
    public function handle(PostData $data, Post $post): Post
    {
        $post->update([
            'title' => $data->title,
            'body' => $data->body,
            'status' => $data->status,
        ]);

        return $post;
    }
}
