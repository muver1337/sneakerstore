<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\Sneaker;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Просмотр от лица пользователя своей корзины
    public function index(): CartResource
    {
        return new CartResource(Auth::user()->sneaker);
    }

    // Удаление товара из корзины
    public function destroyCart(Sneaker $sneaker): \Illuminate\Http\JsonResponse
    {
        Cart::where('sneaker_id', $sneaker->id)->delete();
        return response()->json(['message' => 'Товар успешно удален']);
    }

    // Добавление товара в корзину
    public function addInCart(Sneaker $sneaker): CartResource
    {
        return new CartResource(Cart::create([
            'user_id' => Auth::id(),
            'sneaker_id' => $sneaker->id,
        ]));
    }

    /*
    public function addInCart(Sneaker $sneaker)
    {
        Cart::create([
            'user_id' => Auth::id(),
            'sneaker_id' => $sneaker->id,
        ])
        return response()->json(['message' => 'Товар успешно добавлен в корзину']);
    }
    */
}

