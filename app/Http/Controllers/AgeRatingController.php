<?php

namespace App\Http\Controllers;

use App\Models\AgeRating;
use Illuminate\Http\Request;

class AgeRatingController extends Controller
{
    public function index() // Получение всех возрастных рейтингов
    {
        $ratings = AgeRating::all();
        return response()->json($ratings, 200);
    }
    public function show($id) // Получение возрастного рейтинга по ID
    {
        $rating = AgeRating::findOrFail($id);
        return response()->json($rating, 200);
    }
    public function createAgeRating(Request $request)
    {
        // Валидация входящих данных
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:age_rating,name', // Название должно быть уникальным
        ]);

        // Создание нового возрастного рейтинга
        $ageRating = AgeRating::create([
            'name' => $validatedData['name'],
        ]);

        // Возвращаем успешный ответ с данными нового рейтинга
        return response()->json([
            'message' => 'Возрастной рейтинг успешно добавлен.',
            'age_rating' => $ageRating,
        ], 201);
    }
    public function updateAgeRating(Request $request, $id)
    {
        // Валидация входящих данных
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:age_rating,name,' . $id, // Уникальное имя, исключая текущий ID
        ]);

        // Поиск возрастного рейтинга по ID
        $ageRating = AgeRating::find($id);

        // Проверка, существует ли возрастной рейтинг с таким ID
        if (!$ageRating) {
            return response()->json([
                'message' => 'Возрастной рейтинг не найден.',
            ], 404);
        }

        // Обновление имени возрастного рейтинга
        $ageRating->name = $validatedData['name'];

        // Сохранение изменений
        $ageRating->save();

        // Возвращаем успешный ответ с обновлённым возрастным рейтингом
        return response()->json([
            'message' => 'Возрастной рейтинг успешно обновлён.',
            'age_rating' => $ageRating,
        ], 200);
    }
    public function deleteAgeRating($id)
    {
        // Поиск возрастного рейтинга по ID
        $ageRating = AgeRating::find($id);

        // Проверка, существует ли возрастной рейтинг с таким ID
        if (!$ageRating) {
            return response()->json([
                'message' => 'Возрастной рейтинг не найден.',
            ], 404);
        }

        // Удаление возрастного рейтинга
        $ageRating->delete();

        // Возвращаем успешный ответ
        return response()->json([
            'message' => 'Возрастной рейтинг успешно удалён.',
        ], 200);
    }
}
