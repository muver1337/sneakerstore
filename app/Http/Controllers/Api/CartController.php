<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use Illuminate\Http\Response;

class CartController extends Controller
{
    public function index()
    {
        return CartResource::collection(Cart::all());

    }

    public function cartAdd($sneaker_id)
    {
        return;
    }

}
