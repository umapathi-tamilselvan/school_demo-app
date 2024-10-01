<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [TeacherController::class, 'index'])->name('home');
Route::get('/home/student/create', [TeacherController::class, 'create'])->name('create');
Route::post('/student/submit', [TeacherController::class, 'store']);
Route::get('/home/student/{id}/view', [StudentController::class, 'index']);
Route::get('/home/student/{id}/edit', [StudentController::class, 'show']);
Route::post('/home/student/{id}', [StudentController::class, 'update']);
Route::delete('/home/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
