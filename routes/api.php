<?php

use App\Http\Controllers\Api\AdminSneakerController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SneakerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::group(['namespace' => 'App\Http\Controllers\Api', 'middleware' => ['auth:sanctum']], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::apiResources(['cart' => \App\Http\Controllers\Api\CartController::class]);
});

Route::group(['namespace' => 'App\Http\Controllers\Api'], function () {
    Route::post('register', [AuthController::class, 'registration']);
    Route::post('login', [AuthController::class, 'authorization']);
});

Route::apiResources(['sneaker' => SneakerController::class]);

Route::group(['namespace' => 'App\Http\Controllers\Api', 'middleware' => ['auth:sanctum', 'admin']], function () {
});

