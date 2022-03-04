<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\UserController;
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
Route::get('/cities', [CityController::class, 'index']);
Route::post('/ValideStep1', [UserController::class, 'Step1']);
Route::post('/ValideStep2', [UserController::class, 'Step2']);
Route::post('/AddUsers', [UserController::class, 'store']);
