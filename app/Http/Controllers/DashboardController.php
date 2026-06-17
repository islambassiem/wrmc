<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\PostStatus;
use App\Models\Doctor;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function index(): Factory|View
    {
        return view('dashboard', [
            'doctors' => Doctor::count(),
            'publishedPosts' => Post::where('status', PostStatus::PUBLISHED->value)->count(),
            'draftPosts' => Post::where('status', PostStatus::DRAFT->value)->count(),
        ]);
    }
}
