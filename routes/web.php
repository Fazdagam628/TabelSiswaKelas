<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\StudentController;

// Route::get('/', function () {
//     return view('Student.index', StudentController::class);
// });


// Route::get('/', function () {
//     return view('welcome');
// });
Route::resource('students', StudentController::class);
Route::get('/', [StudentController::class, 'index'])->name('students.index');
Route::get('/symlink', function () {
    Artisan::call('storage:link');
});