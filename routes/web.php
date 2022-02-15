<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\TripController;

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

Route::get('/', [HomeController::class,'index']);

Route::get('login',[SessionsController::class,'create'])->middleware('guest');;
Route::post('login',[SessionsController::class,'store'])->middleware('guest');;
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('register',[RegisterController::class, 'create'])->middleware('guest');
Route::post('register',[RegisterController::class, 'store'])->middleware('guest');

Route::get('bus', [BusController::class, 'index']);
Route::get('bus/create', [BusController::class,'create']);
Route::post('bus/create', [BusController::class,'store']);
Route::get('bus/details/{bus}',[BusController::class,'update']);
Route::delete('bus/{bus}', [BusController::class, 'destroy']);

Route::get('trip', [TripController::class,'index']);
Route::get('trip/create/{bus}',[TripController::class, 'create']);
Route::post('trip/create/{bus}',[TripController::class, 'store']);

