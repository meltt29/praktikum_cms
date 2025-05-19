<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;

Route::resource('films', FilmController::class);