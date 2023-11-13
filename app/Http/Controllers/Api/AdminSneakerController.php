<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SneakerStoreRequest;
use App\Http\Resources\SneakerResource;
use App\Models\Sneaker;
use Illuminate\Http\Response;

class AdminSneakerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SneakerStoreRequest $request)
    {
        $add_sneaker = Sneaker::create($request->validated());

        return new SneakerResource($add_sneaker);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sneaker $sneaker)
    {
        return new SneakerResource($sneaker);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SneakerStoreRequest $request, Sneaker $sneaker)
    {
        $sneaker->update($request->validated());

        return new SneakerResource($sneaker);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $sneaker = Sneaker::find($id);

        if (!$sneaker) {
            return response()->json(['message' => 'Sneaker not found'], 404);
        }

        $sneaker->delete();

        return response()->json(['message' => 'Sneaker deleted successfully']);
    }
}
