<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\Http\Requests\SneakerStoreRequest;
use App\Http\Resources\CartResource;
use App\Http\Resources\SneakerResource;
use App\Models\Cart;
use App\Models\Sneaker;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use MongoDB\Driver\Session;
use function Psy\debug;

class CartController extends Controller
{
    public function index()
    {
        return CartResource::collection(Cart::all());

    }

//    public function addInCart(CartRequest $request)
//    {
//        $add_cart = Cart::create($request->validated());
//
//        return new CartResource($add_cart);
//    }

    public function destroyCart($id) {
        $cart = Cart::find($id);

        if (!$cart) {
            return response()->json(['message' => 'Товар не найден'], 404);
        }

        $cart->delete();
        return response()->json(['message' => 'Товар успешно удален']);
    }

    public function addInCart(Sneaker $sneaker)
    {
        // Получение id авторизованного пользователя
        $user_Id = Auth::id();
        Log::debug(Auth::id());
        // Добавление товара в корзину
        Cart::create([
            'user_id' => $user_Id,
            'sneaker_id' => $sneakerId,
            'size' => $size,
            'cost' => $cost,
        ]);

        return response()->json(['message' => 'Товар успешно добавлен в корзину']);
    }
}

