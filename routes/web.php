<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BackgroundController;


Route::get('/film/error/{id}', [FilmController::class, 'showWithCatch']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/films/sudah-ditonton', [FilmController::class, 'sudahDitonton'])->name('films.sudah_ditonton');
    Route::get('/films/ingin-ditonton', [FilmController::class, 'inginDitonton'])->name('films.ingin_ditonton');
    Route::resource('films', FilmController::class);
    Route::resource('images', ImageController::class);
    Route::get('/background', [BackgroundController::class, 'edit'])->name('background.edit');
    Route::put('/background', [BackgroundController::class, 'update'])->name('background.update');
});

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('films.index');
    }
    return redirect()->route('login');
});

Route::get('/home', function () {
    return redirect()->route('films.index');
});

Route::get('/reset-password', [AuthController::class, 'showResetPasswordForm'])->name('password.request');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');