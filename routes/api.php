<?php

use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\Tickets;
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

Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

Route::group(['middleware' => 'auth:sanctum'],function(){
    Route::post('logout',[AuthController::class,'logout']);
    Route::post('changepassword',[AuthController::class,'changepassword']);
    Route::resource('services',ServiceController::class);
    Route::resource('products',ProductController::class);
    Route::post('search',[SearchController::class,'search']);
    Route::apiResource('appoints',AppointmentController::class);
    Route::post('tickets',[Tickets::class,'tickets']);

});

