<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\StudentController;
use App\Http\Controllers\ScoreController;
Route::get('/students', [StudentController::class, 'index']);
Route::get('/scores/create', [ScoreController::class, 'create'])->name('scores.create');
Route::post('/scores', [ScoreController::class, 'store'])->name('scores.store');
