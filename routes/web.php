<?php
use App\Http\Controllers\FilmController ;
Route::resource('films', \App\Http\Controllers\FilmController::class);

Route::resource('films', \App\Http\Controllers\FilmController::class);
Route::resource('genres', \App\Http\Controllers\GenreController::class);
Route::resource('sutradaras', \App\Http\Controllers\SutradaraController::class);
Route::resource('aktors', \App\Http\Controllers\AktorController::class);
Route::resource('films', FilmController::class);
