<?php

use App\Http\Controllers\TaskController;
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

Route::get('/', [TaskController::class,'index']);
Route::post('task-submit',[TaskController::class,'store']);
Route::get('complete-task/{id}',[TaskController::class,'updateTask']);
Route::get('show-all-task',[TaskController::class,'getAll']);
Route::get('delete-task/{id}',[TaskController::class,'delete']);
