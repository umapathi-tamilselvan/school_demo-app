<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StandardController;

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

Route::get('/home', [StandardController::class, 'index'])->name('home');
Route::get('/create', [StandardController::class,'create'])->name('create');
Route::get('/contact',[StandardController::class,'show']);
Route::post('/create/submit', [StandardController::class,'store']);
Route::get('/home/view/{id}', [StudentController::class,'index']);
Route::get('/home/edit/{id}', [StudentController::class,'show']);
Route::post('/home/edit/{id}', [StudentController::class,'update']);
Route::delete('/home/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

