<?php

use App\Http\Controllers\Api\AdminSneakerController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\SneakerController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Пути для всех пользователей
Route::get('sneaker', [SneakerController::class, 'index']); // Список кроссовок
Route::get('sneaker/{id}', [SneakerController::class, 'show']); // Страница кроссовка

//Пути для авторизированных
Route::group(['namespace' => 'App\Http\Controllers\Api', 'middleware' => ['auth:sanctum']], function () {
    Route::post('logout', [AuthController::class, 'logout']); // Выход
    Route::get('cart', [CartController::class, 'index']); // Список в корзине
    Route::post('addCart', [CartController::class, 'addInCart']); // Добавить в корзину
});

// Пути для не авторизированных
Route::group(['namespace' => 'App\Http\Controllers\Api'], function () {
    Route::post('register', [AuthController::class, 'registration']); // Регистрация
    Route::post('login', [AuthController::class, 'authorization']); // Авторизация
});

// Пути для админа
Route::group(['namespace' => 'App\Http\Controllers\Api', 'middleware' => ['auth:sanctum', 'admin']], function () {
    Route::get('users', [UserController::class, 'users']); // Вывод всех пользователей
    Route::delete('sneaker/{id}', [AdminSneakerController::class, 'destroy']); // Удаление кроссовка по id
    Route::post('sneaker', [AdminSneakerController::class, 'store']); // Добавить кроссовок
});

