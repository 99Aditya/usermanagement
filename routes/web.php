<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[UserController::class,'index']);
Route::get('add-members',[UserController::class,'addMembers']);
Route::post('save-members',[UserController::class,'saveMembers']);
Route::post('get-cities', [UserController::class, 'getCities']);
Route::get('get-users/{id}',[UserController::class,'getUsers']);
