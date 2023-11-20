<?php

namespace App\Http\Resources;

use App\Models\Sneaker;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'user_id' => $request->user()->id,
            'items_amount' => count($request->user()->sneaker),
            'sneakers' => [
                SneakerResource::collection($request->user()->sneaker)
            ]
        ];
    }
}
