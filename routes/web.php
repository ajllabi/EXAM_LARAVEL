<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('home');
});

// Route::get('/home', function () {
//     return view('home');
// });


Route::resource('/students', StudentController::class);
//Route::get('/students', [StudentController::class, 'students'])->name('students');

// For showing a single student
Route::get('/student/{id}', [StudentController::class, 'show'])->name('students.show');

Route::get('/student/{id}/', [StudentController::class, 'edit'])->name('students.edit');
