<?php

declare(strict_types=1);

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

Route::get('/', fn (): Factory|View => view('welcome'))->name('home');

Route::middleware(['auth'])->prefix('admin')->group(function (): void {
    Route::get('/dashboard', fn (): Factory|View => view('dashboard', ['title' => 'Dashboard']))->name('dashboard');
    Route::resource('categories', CategoryController::class)
        ->only('index', 'store', 'update');
    Route::resource('posts', PostController::class)
        ->only('index', 'edit', 'update', 'create', 'store');
    Route::resource('users', UserController::class);
});

require __DIR__.'/auth.php';
