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
        // Создание нового типа аниме
        $animeType = AnimeType::create([
            'name' => $request->input('name'),
        ]);

        // Возвращаем успешный ответ с созданным типом
        return response()->json([
            'message' => 'Тип аниме успешно добавлен.',
            'anime_type' => $animeType,
        ], 201);
    }
    public function updateAnimeType(AnimeTypeRequest $request, $id)
    {
        // Поиск типа аниме по ID
        $animeType = AnimeType::find($id);

        // Проверка существования типа аниме
        if (!$animeType) {
            return response()->json([
                'message' => 'Тип аниме не найден.',
            ], 404);
        }

        // Обновление имени типа аниме
        $animeType->name = $request->input('name');
        $animeType->save();

        // Возвращаем успешный ответ
        return response()->json([
            'message' => 'Тип аниме успешно обновлён.',
            'anime_type' => $animeType,
        ], 200);
    }
    public function deleteAnimeType($id)
    {
        // Поиск типа аниме по ID
        $animeType = AnimeType::find($id);

        // Проверка, существует ли тип аниме
        if (!$animeType) {
            return response()->json([
                'message' => 'Тип аниме не найден.',
            ], 404);
        }

        // Удаление типа аниме
        $animeType->delete();

        // Возвращаем успешный ответ
        return response()->json([
            'message' => 'Тип аниме успешно удален.',
        ], 200);
    }
}
