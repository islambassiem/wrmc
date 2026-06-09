<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'))->name('home');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', fn () => view('dashboard', ['title' => 'Dashboard']))->name('dashboard');

    Route::resource('users', UserController::class);
});

require __DIR__.'/auth.php';
