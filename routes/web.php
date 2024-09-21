<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------|
| Web Routes                                                                |
|--------------------------------------------------------------------------|
| Here is where you can register web routes for your application. These    |
| routes are loaded by the RouteServiceProvider and all of them will be    |
| assigned to the "web" middleware group. Make something great!            |
|--------------------------------------------------------------------------|
*/

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
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard'); // List users view
    Route::get('/manage-job', function () {
        return view('manage-job');
    })->name('manage-job');

    Route::get('/manage-design', function () {
        return view('manage-design');
    })->name('manage-design');

});


Route::middleware('isAdmin:admin')->group(function () {
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users-edit'); // Edit user view
    Route::get('/users-create', [UserController::class, 'create'])->name('users-create'); // Create user view
});


Route::post('/users', [UserController::class, 'store']); // Store new user

Route::post('/users/{id}/edit', [UserController::class, 'update']); // Update existing user

Route::get('/users/{id}', [UserController::class, 'show'])->name('users-show'); // indiv post view

// static form view
Route::get('/form', function () {
    return view('form');
})->name('form');