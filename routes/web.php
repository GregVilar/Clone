<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
})->name('/welcome');

Route::get('/', function () {
    return view('welcome');
})->name('/welcome');

Route::get('/inspiration', function () {
    return view('inspiration');
})->name('/inspiration');

Route::get('/pro', function () {
    return view('pro');
})->name('/pro');

Route::get('/designer', function () {
    return view('designer');
})->name('/designer');

Route::get('/job-post', function () {
    return view('job-post');
})->name('/job-post');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/manage-job', function () {
        return view('manage-job');
    })->name('manage-job');

    Route::get('/manage-design', function () {
        return view('manage-design');
    })->name('manage-design');
});
