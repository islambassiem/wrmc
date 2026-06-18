<?php

namespace App\Http\Controllers\Public;

use App\Enums\PostStatus;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Post;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home', [
            'doctors' => $this->doctors(),
            'posts' => $this->posts(),
        ]);
    }

    /**
     * @return Collection<int, Doctor>
     */
    private function doctors(): Collection
    {
        return Doctor::query()
            ->where(function ($query): void {
                $query->whereNull('resignation_date')
                    ->orWhere('resignation_date', '>=', CarbonImmutable::now()->startOfDay()->format('Y-m-d'));
            })
            ->select('id', 'name', 'slug', 'title', 'image')
            ->get();
    }

    /**
     * @return Collection<int, Post>
     */
    private function posts(): Collection
    {
        $posts = Post::query()
            ->where('status', PostStatus::PUBLISHED->value)
            ->select('id', 'title', 'slug', 'thumbnail')
            ->selectRaw('substr(body, 1, 150) as body')
            ->orderBy('updated_by', 'desc')
            ->limit(4)
            ->get();

        return $posts->each(function ($post): void {
            $post->body = strip_tags((string) $post->body);
        });
    }
}
