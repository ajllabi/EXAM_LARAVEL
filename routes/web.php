<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\AdministratorController;

Route::get('/', function () {
    return view('home');
});

Route::get('/maintenance', function () {
    return view('maintenance');
});


Route::resource('/students', StudentController::class);

Route::resource('/teachers', TeacherController::class);

Route::resource('/courses', CourseController::class);

Route::resource('/enrollments', EnrollmentController::class);

Route::resource('/administrators', AdministratorController::class);