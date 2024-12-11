<?php

namespace App\Http\Controllers;

use App\Models\Studio;
use App\Http\Request\Studio\StudioRequest;
use Illuminate\Http\Request;

class StudioController extends Controller
{
    public function index() // Получение всех студий
    {
        $studios = Studio::all(); // Получаем все студии
        return response()->json($studios, 200);
    }

    public function show($id) // Получение студии по ID
    {
        $studio = Studio::findOrFail($id); // Находим студию по ID
        return response()->json($studio, 200);
    }

    public function createStudio(StudioRequest $request)
    {
        // Создание новой студии
        $studio = Studio::create([
            'name' => $request->validated()['name'],
        ]);

        // Возвращаем успешный ответ с информацией о новой студии
        return response()->json([
            'message' => 'Студия успешно добавлена.',
            'studio' => $studio,
        ], 201);
    }

    public function updateStudio(StudioRequest $request, $id)
    {
        // Поиск студии по ID
        $studio = Studio::find($id);

        // Проверка, существует ли студия с таким ID
        if (!$studio) {
            return response()->json([
                'message' => 'Студия не найдена.',
            ], 404);
        }

        // Обновление названия студии
        $studio->name = $request->validated()['name'];

        // Сохранение изменений
        $studio->save();

        // Возвращаем успешный ответ с обновленной студией
        return response()->json([
            'message' => 'Студия успешно обновлена.',
            'studio' => $studio,
        ], 200);
    }

    public function deleteStudio($id)
    {
        // Поиск студии по ID
        $studio = Studio::find($id);

        // Проверка, существует ли студия с таким ID
        if (!$studio) {
            return response()->json([
                'message' => 'Студия не найдена.',
            ], 404);
        }

        // Удаление студии
        $studio->delete();

        // Возвращаем успешный ответ
        return response()->json([
            'message' => 'Студия успешно удалена.',
        ], 200);
    }
}
