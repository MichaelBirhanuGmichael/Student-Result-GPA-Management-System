<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\StudentController;
use App\Http\Controllers\ScoreController;
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/export/excel', [StudentController::class, 'exportExcel'])->name('students.export.excel');
Route::get('/students/export/pdf', [StudentController::class, 'exportPDF'])->name('students.export.pdf');
Route::get('/scores/create', [ScoreController::class, 'create'])->name('scores.create');
Route::post('/scores', [ScoreController::class, 'store'])->name('scores.store');
