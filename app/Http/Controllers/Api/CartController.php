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
use MongoDB\Driver\Session;

class CartController extends Controller
{
    public function index()
    {
        return CartResource::collection(Cart::all());

    }

    public function addInCart(CartRequest $request)
    {
        $add_cart = Cart::create($request->validated());

        return new CartResource($add_cart);
    }

}
//    public function addCart(Request $request)
//    {
//        $sneaker = Sneaker::query()->where(['id' => $request->id])->first();
//
//        $sessionId = User::getId();
//
//        \Cart::session($sessionId)->add([
//            'id' => $sneaker,
//            'name' => $sneaker->name,
//            'price' => $sneaker->price,
//            'quantity' => 4,
//            'attributes' => [
//                'image' => $sneaker->image,
//            ]
//        ]);
//
//        $cart = \Cart::getContent();
//
//        return redirect()->back();
//    }

