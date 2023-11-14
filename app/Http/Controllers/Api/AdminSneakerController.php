<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SneakerStoreRequest;
use App\Http\Resources\SneakerResource;
use App\Models\Sneaker;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminSneakerController extends Controller
{
    public function store(SneakerStoreRequest $request)
    {
        $add_sneaker = Sneaker::create($request->validated());

        return new SneakerResource($add_sneaker);
    }

    public function update(Request $request, $id)
    {
        $sneaker = Sneaker::findOrFail($id);

        $sneaker->update($request->all());

        return response()->json(['message' => 'Обновление прошло успешно', 'data' => $sneaker]);
    }

    public function destroy($id) {
        $sneaker = Sneaker::find($id);

        if (!$sneaker) {
            return response()->json(['message' => 'Не найдего'], 404);
        }

        $sneaker->delete();

        return response()->json(['message' => 'Успешно удалено']);
    }
}
