<?php

namespace App\Http\Controllers;

use App\Http\Request\List\AnimeTypeRequest;
use App\Models\AnimeType;
use Illuminate\Http\Request;

class AnimeTypeController extends Controller
{
    public function index()
    {
        return response()->json(AnimeType::all());
    }

    public function createAnimeType(AnimeTypeRequest $request)
    {
        $animeType = AnimeType::create([
            'name' => $request->input('name'),
        ]);

        return response()->json([
            'message' => 'Тип аниме успешно добавлен.',
            'anime_type' => $animeType,
        ], 201);
    }
    public function updateAnimeType(AnimeTypeRequest $request, $id)
    {
        $animeType = AnimeType::find($id);

        if (!$animeType) {
            return response()->json([
                'message' => 'Тип аниме не найден.',
            ], 404);
        }

        $animeType->name = $request->input('name');
        $animeType->save();

        return response()->json([
            'message' => 'Тип аниме успешно обновлён.',
            'anime_type' => $animeType,
        ], 200);
    }
    public function deleteAnimeType($id)
    {
        $animeType = AnimeType::find($id);

        if (!$animeType) {
            return response()->json([
                'message' => 'Тип аниме не найден.',
            ], 404);
        }

        $animeType->delete();

        return response()->json([
            'message' => 'Тип аниме успешно удален.',
        ], 200);
    }
}
