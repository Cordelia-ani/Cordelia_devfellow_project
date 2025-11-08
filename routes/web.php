<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SchoolController;

Route::get('/', function () {

    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware(['auth', 'role:SuperAdmin'])->get('/super/dashboard', function () {
    //dd(Auth::user());

    return response('SuperAdmin Dashboard', 200);
})->name('super.dashboard');

Route::middleware(['auth', 'role:Teacher'])->get('/teacher/dashboard', function () {
    return response('Teacher Dashboard', 200);
})->name('teacher.dashboard');

Route::middleware(['auth', 'role:Student'])->get('/student/dashboard', function () {
    return response('Student Dashboard', 200);
})->name('student.dashboard');


Route::middleware(['auth', 'role:SchoolAdmin'])->get('/school/dashboard', function () {
    return response('SchoolAdmin Dashboard', 200);
})->name('school.dashboard');

Route::middleware(['auth', 'role:Parent'])->get('/parent/dashboard', function () {
    return response('Parent Dashboard', 200);
})->name('parent.dashboard');

Route::middleware(['auth', 'role:Bursar'])->get('/bursar/dashboard', function () {
    return response('Bursar Dashboard', 200);
})->name('bursar.dashboard');



Route::middleware(['auth', 'superadmin'])->group(function () {
Route::resource('schools', SchoolController::class);
});
