<?php

namespace App\Http\Controllers;

use App\Actions\CreatePostAction;
use App\Actions\DeletePostAction;
use App\Actions\UpdatePostAction;
use App\Data\PostData;
use App\Enums\CategoryType;
use App\Enums\Permission;
use App\Enums\PostStatus;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $posts = Post::query()
            ->when($request->input('status'), function ($query) use ($request): void {
                $query->where('status', $request->input('status'));
            })
            ->select(['id', 'title', 'status', 'slug', 'created_at', 'updated_at'])
            ->latest('updated_at')
            ->paginate(10)
            ->withQueryString();

        return view('pages.posts.index', [
            'statuses' => $this->statuses(),
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::query()
            ->where('type', CategoryType::POST)
            ->select(['id', 'name'])
            ->get();

        return view('pages.posts.create', [
            'categories' => $categories,
            'sessionToken' => $this->sessionToken(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request): RedirectResponse
    {
        Gate::authorize(Permission::POST_CREATE);

        $body = PostService::deleteUnusedFiles(
            $request->string('body')->value(),
            $request->string('session_token')->value()
        );

        resolve(CreatePostAction::class)->handle(
            new PostData(
                title: $request->string('title')->value(),
                body: $body,
            )
        );

        return to_route('posts.index')->with('success', 'Post created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): View
    {
        return view('pages.posts.edit', [
            'sessionToken' => $this->sessionToken(),
            'statuses' => $this->statuses(),
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        Gate::authorize(Permission::POST_UPDATE);

        $body = PostService::deleteUnusedFiles(
            $request->string('body')->value(),
            $request->string('session_token')->value()
        );

        resolve(UpdatePostAction::class)->handle(
            new PostData(
                title: $request->string('title')->value(),
                body: $body,
                status: $request->string('status'),
            ), $post
        );

        return to_route('posts.index')
            ->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
        Gate::authorize(Permission::POST_DELETE);

        resolve(DeletePostAction::class)->handle($post);

        return to_route('posts.index')
            ->with('success', 'Post deleted successfully');
    }

    /**
     * @return PostStatus[]
     */
    private function statuses(): array
    {
        return PostStatus::cases();
    }

    private function sessionToken(): string
    {
        $sessionToken = (string) Str::uuid();
        session()->put('upload_session_token', $sessionToken);

        return $sessionToken;
    }
}
