<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SneakerStoreRequest;
use App\Http\Resources\SneakerResource;
use App\Models\Cart;
use App\Models\Sneaker;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SneakerController extends Controller
{
    public function index()
    {
        return SneakerResource::collection(Sneaker::all());

    }

    public function show($id) {
        $sneaker = Sneaker::find($id);
        return response()->json($sneaker);
    }

    public function addinCart($sneaker_id, $size, $cost)
    {
        // Получение id авторизованного пользователя
        $user_Id = Auth::id();

        // Добавление товара в корзину
        Cart::create([
            'user_id' => $user_Id,
            'sneaker_id' => $sneaker_id,
            'size' => $size,
            'cost' => $cost,
        ]);

        return response()->json(['message' => 'Товар успешно добавлен в корзину']);
    }

}
