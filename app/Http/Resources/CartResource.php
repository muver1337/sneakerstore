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
            'topics_amount' => count($request->user()->sneaker),
            'topics' => [
                SneakerResource::collection($request->user()->sneaker)
            ]
        ];
//        return [
//            'id' => $this->id,
//            'user_id' => $this->user_id,
//            'sneaker_id' => $this->sneaker_id,
//            'size' => $this->size,
//            'cost' => $this->cost,
//        ];
    }
}
