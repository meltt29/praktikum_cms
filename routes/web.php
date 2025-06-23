<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\AuthController;


Route::get('/film/error/{id}', [FilmController::class, 'showWithCatch']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/film/error/{id}', [FilmController::class, 'showWithCatch']);
    Route::resource('films', FilmController::class);
    Route::resource('images', ImageController::class);
});

