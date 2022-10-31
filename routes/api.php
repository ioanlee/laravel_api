<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cars', [App\Http\Controllers\CarController::class, 'get']);
Route::get('/users', [App\Http\Controllers\UserController::class, 'get']);
Route::get('/drivers', [App\Http\Controllers\DriverController::class, 'get']);
Route::post('/drivers', [App\Http\Controllers\DriverController::class, 'set']);
Route::delete('/drivers/{id}', [App\Http\Controllers\DriverController::class, 'delete']);