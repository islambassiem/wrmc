<?php

declare(strict_types=1);

use App\Enums\PostStatus;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostImageUploadController;
use App\Http\Controllers\Public\DoctorContoller as PublicDoctorController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\PublicPostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/doctor/{doctor}', PublicDoctorController::class)->name('doctor.show');
Route::get('post/{post}', PublicPostController::class)->name('post.show');

Route::middleware(['auth'])->prefix('admin')->group(function (): void {
    Route::get('/dashboard', fn (): Factory|View => view('dashboard', ['title' => 'Dashboard']))->name('dashboard');
    Route::resource('categories', CategoryController::class)
        ->only('index', 'store', 'update');
    Route::resource('posts', PostController::class)
        ->only('index', 'edit', 'update', 'create', 'store');
    Route::resource('doctors', DoctorController::class)
        ->scoped(['doctor' => 'slug'])
        ->only('index', 'edit', 'update', 'create', 'store');
    Route::post('upload-post-image', PostImageUploadController::class)->name('uploadImage');
    Route::resource('users', UserController::class);
});

require __DIR__.'/auth.php';

Route::get('test', function (){
    $posts = Post::query()
            ->where('status', PostStatus::PUBLISHED->value)
            ->select('id', 'title', 'slug', 'image')
            ->selectRaw("substr(body, 1, 150) as body")
            ->orderBy('updated_by', 'desc')
            ->limit(4)
            ->get();

    $clean = $posts->each(function ($post) {
        $post->body = strip_tags($post->body);
    });

    dd($clean);
});
