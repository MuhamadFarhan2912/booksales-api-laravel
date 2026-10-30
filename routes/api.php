<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AuthController;

// Authentication
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth:api');

// Public: dapat diakses tanpa login
Route::apiResource('/books', BookController::class)
    ->only(['index', 'show']);

Route::apiResource('/authors', AuthorController::class)
    ->only(['index', 'show']);

Route::apiResource('/genres', GenreController::class)
    ->only(['index', 'show']);

// Harus login
Route::middleware(['auth:api'])->group(function () {

    // Khusus Admin
    Route::middleware(['role:admin'])->group(function () {

        // Book khusus Admin
        Route::apiResource('/books', BookController::class)
            ->only(['store', 'update', 'destroy']);

        // Author khusus Admin
        Route::apiResource('/authors', AuthorController::class)
            ->except(['index', 'show']);

        // Genre khusus Admin
        Route::apiResource('/genres', GenreController::class)
            ->except(['index', 'show']);
    });
});
