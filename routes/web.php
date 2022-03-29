<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\BookingController;

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
Route::get('bus/show/{bus}',[BusController::class,'show']);
Route::get('bus/{bus}/edit',[BusController::class,'edit']);
Route::patch('bus/{bus}',[BusController::class,'update']);
Route::delete('bus/{bus}', [BusController::class, 'destroy']);

Route::post('seat/store/{bus}',[SeatController::class, 'store']);

Route::get('trip', [TripController::class,'index']);
Route::get('trip/create/{bus}',[TripController::class, 'create']);
Route::get('trip/show/{trip}',[TripController::class, 'show']);
Route::post('trip/create/{bus}{driver}',[TripController::class, 'store']);
Route::get('trip/{trip}/edit',[TripController::class,'edit']);
Route::get('/trip/selected-from/{from}',[TripController::class,'getRoutes']);
Route::patch('trip/{trip}',[TripController::class,'update']);
Route::delete('trip/{trip}', [TripController::class, 'destroy']);

Route::get('location/index',[LocationController::class,'index']);
Route::get('location/create', [LocationController::class, 'create']);
Route::post('location/create',[LocationController::class, 'store']);

Route::get('route/index', [RouteController::class,'index']);
Route::get('route/create', [RouteController::class, 'create']);
Route::post('route/create', [RouteController::class, 'store']);

Route::get('driver/index', [DriverController::class,'index']);
Route::get('driver/create', [DriverController::class, 'create']);
Route::post('driver/create', [DriverController::class, 'store']);

Route::get('booking/create/{trip}',[BookingController::class,'create']);
Route::post('booking/create/{trip}',[BookingController::class,'store']);
Route::get('booking/show',[BookingController::class,'show']);
Route::get('/export-pdf', [BookingController::class, 'exportPdf']);

