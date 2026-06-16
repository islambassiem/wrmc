<?php

namespace App\Http\Controllers;

use App\Actions\CreatePostAction;
use App\Actions\UpdatePostAction;
use App\Data\PostData;
use App\Enums\CategoryType;
use App\Enums\Permission;
use App\Enums\PostStatus;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
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
            ->when($request->input('category_id'), function ($query) use ($request): void {
                $query->where('category_id', $request->input('category_id'));
            })
            ->when($request->input('status'), function ($query) use ($request): void {
                $query->where('status', $request->input('status'));
            })
            ->with('category')
            ->select(['id', 'title', 'status', 'category_id', 'slug', 'created_at', 'updated_at'])
            ->latest('updated_at')
            ->paginate(10)
            ->withQueryString();

        return view('pages.posts.index', [
            'statuses' => $this->statuses(),
            'categories' => $this->categories(),
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

        $body = $this->deleteUnusedFiles(
            $request->string('body')->value(),
            $request->string('session_token')->value()
        );

        resolve(CreatePostAction::class)->handle(
            new PostData(
                title: $request->string('title')->value(),
                body: $body,
                category_id: $request->integer('category_id'),
                status: $request->string('status'),
            )
        );

        return to_route('posts.index')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): View
    {
        return view('pages.posts.edit', [
            'sessionToken' => $this->sessionToken(),
            'categories' => $this->categories(),
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

        $body = $this->deleteUnusedFiles(
            $request->string('body')->value(),
            $request->string('session_token')->value()
        );

        resolve(UpdatePostAction::class)->handle(
            new PostData(
                title: $request->string('title')->value(),
                body: $body,
                category_id: $request->integer('category_id'),
                status: $request->string('status'),
            ), $post
        );

        return to_route('posts.index')
            ->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): void
    {
        //
    }

    /**
     * @return Collection<int, Category>
     */
    private function categories(): Collection
    {
        return Category::query()
            ->where('type', CategoryType::POST)
            ->select(['id', 'name'])
            ->get();
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

    private function deleteUnusedFiles(string $body, string $sessionToken): string
    {
        preg_match_all('/<img[^>]+src="([^"]+)"/i', $body, $matches);
        $usedUrls = $matches[1];

        $tempUploads = DB::table('temp_uploads')->where('session_token', $sessionToken)->get();

        $idsToDelete = [];

        foreach ($tempUploads as $upload) {

            if (empty($upload->path)) {
                continue;
            }

            if (! \is_string($upload->path)) {
                continue;
            }

            $url = Storage::url($upload->path);

            $normalizedStorageUrl = parse_url($url, PHP_URL_PATH);
            $normalizedUsedUrls = array_map(fn ($u): string|false|null => parse_url($u, PHP_URL_PATH), $usedUrls);

            if (\in_array($normalizedStorageUrl, $normalizedUsedUrls)) {
                $newPath = str_replace('temp/', 'posts/', $upload->path);

                Storage::disk('public')->makeDirectory('posts');
                Storage::disk('public')->move($upload->path, $newPath);

                $newUrl = Storage::url($newPath);
                $body = str_replace($url, $newUrl, $body);

                $body = str_replace(
                    url($url),
                    url($newUrl),
                    $body
                );
            } else {
                Storage::disk('public')->delete($upload->path);
            }

            $idsToDelete[] = $upload->id;
        }

        DB::table('temp_uploads')->whereIn('id', $idsToDelete)->delete();

        session()->forget('upload_session_token');

        return $body;
    }
}
