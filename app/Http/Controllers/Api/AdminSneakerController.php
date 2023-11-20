<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SneakerStoreRequest;
use App\Http\Resources\SneakerResource;
use App\Models\Sneaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminSneakerController extends Controller
{
    public function store(SneakerStoreRequest $request): SneakerResource
    {
        return new SneakerResource(Sneaker::create($request->validated()));
    }

    public function update(Request $request, $id)
    {
        $sneaker = Sneaker::findOrFail($id);

        $sneaker->update($request->all());

        return response()->json(['message' => 'Обновление прошло успешно', 'data' => $sneaker]);
    }

    public function destroy($id)
    {
        $sneaker = Sneaker::find($id);

        if (!$sneaker) {
            return response()->json(['message' => 'Не найдено'], 404);
        }
        $sneaker->delete();
        return response()->json(['message' => 'Успешно удалено']);
    }
}
