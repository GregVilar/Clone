<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/inspiration', function () {
    return view('inspiration');
})->name('inspiration');

Route::get('/pro', function () {
    return view('pro');
})->name('pro');

Route::get('/designer', function () {
    return view('designer');
})->name('designer');

Route::get('/job-post', function () {
    return view('job-post');
})->name('job-post');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'isAdmin:admin'
])->group(function () {
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/manage-job', function () {
        return view('manage-job');
    })->name('manage-job');

    Route::get('/manage-design', function () {
        return view('manage-design');
    })->name('manage-design');

    // Manage posts routes
    Route::get('/manage-post', [PostController::class, 'index'])->name('manage-post');  // List posts view
    Route::get('/posts-create', [PostController::class, 'create'])->name('posts-create'); // Create post view
    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit'); // Edit post view
});

    Route::post('/posts', [PostController::class, 'store'])->name('posts.store'); // Store new post
    Route::post('/posts/{id}', [PostController::class, 'update'])->name('posts.update'); // Update existing post
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('users.show'); // Individual post view


// Static form view
Route::get('/form', function () {
    return view('form');
})->name('form');
