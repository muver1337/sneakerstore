<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SneakerStoreRequest;
use App\Http\Resources\SneakerResource;
use App\Models\Sneaker;
use Illuminate\Http\Response;

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

}
