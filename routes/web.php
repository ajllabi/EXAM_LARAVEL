<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('home');
});

Route::resource('students', StudentController::class);
//Route::get('/students', [StudentController::class, 'inedx'])->name('inedx');

// For showing a single student
Route::get('/student/{student}', [StudentController::class, 'show'])->name('student.show');

Route::get('/student/{id}', [StudentController::class, 'edit'])->name('student.edit');
