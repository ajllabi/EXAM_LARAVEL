<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;

Route::get('/', function () {
    return view('home');
});

Route::get('/maintenance', function () {
    return view('maintenance');
});


Route::resource('/students', StudentController::class);
//Route::get('/students', [StudentController::class, 'students'])->name('students');

// For showing a single student
Route::get('/student/{id}', [StudentController::class, 'show'])->name('students.show');

Route::get('/student/{id}/', [StudentController::class, 'edit'])->name('students.edit');

Route::resource('/teachers', TeacherController::class);

Route::resource('/courses', CourseController::class);

Route::resource('/enrollments', EnrollmentController::class);