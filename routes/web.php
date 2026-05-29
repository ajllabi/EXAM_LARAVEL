<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\AdministratorController;

Route::get('/', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/maintenance', function () {
    return view('maintenance');
})->middleware(['auth', 'verified'])->name('dashboard');


//Route::resource('/students', StudentController::class);
Route::resource('/students', StudentController::class)
    ->middleware(['auth', 'verified']);


Route::resource('/teachers', TeacherController::class)->middleware(['auth', 'verified']);

Route::resource('/courses', CourseController::class)->middleware(['auth', 'verified']);

Route::resource('/enrollments', EnrollmentController::class)->middleware(['auth', 'verified']);

Route::resource('/administrators', AdministratorController::class)->middleware(['auth', 'verified']);


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
