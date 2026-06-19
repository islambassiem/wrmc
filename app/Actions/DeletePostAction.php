<?php

namespace App\Actions;

use App\Models\Post;
use App\Services\PostService;
use Illuminate\Support\Facades\Storage;

class DeletePostAction
{
    public function handle(Post $post): void
    {
        $this->deleteImages($post->body);

        $post->delete();
    }

    private function deleteImages(string $body): void
    {
        $images = PostService::postImages($body);

        if ($images === null || $images === []) {
            return;
        }

        foreach ($images as $image) {
            $path = str_replace('/storage/', '', $image);

            Storage::disk('public')->delete($path);
        }
    }
}
