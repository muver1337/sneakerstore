<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Admin;
use App\Http\Resources\AdminCartResource;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use Illuminate\Support\Facades\Log;

class AdminCartController extends Controller
{
    // Просмотр корзин всех пользователей
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return CartResource::collection(Cart::all()->groupBy('user_id'));
    }
}
