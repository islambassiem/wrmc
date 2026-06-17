<?php

namespace App\Http\Controllers\Public;

use App\Enums\PostStatus;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\View\View;

class PublicPostController extends Controller
{
    public function __invoke(Post $post): View
    {
        return view('pages.public.posts.index', [
            'post' => $post->load('category'),
            'related' => Post::query()
                ->where('id', '!=', $post->id)
                ->where('status', PostStatus::PUBLISHED->value)
                ->selectRaw('id, title, slug, substr(body, 1, 150) as body')
                ->limit(3)
                ->get(),
        ]);
    }
}
