<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
// use Illuminate\Routing\Route;

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

Route::get('/',[StudentController::class, 'index'])->middleware('auth');
Route::get('/add/student',[StudentController::class, 'create']);
Route::post('/add/student',[StudentController::class, 'store']);
Route::get('/student/{id}',[StudentController::class, 'show']);
Route::put('/student/{student}',[StudentController::class, 'update']);
Route::delete('/student/{student}',[StudentController::class, 'destroy']);


Route::get('/register', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login/process', [UserController::class, 'process']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/store', [UserController::class, 'store']);