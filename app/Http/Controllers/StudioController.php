<?php

namespace App\Http\Controllers;

use App\Models\Studio;
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

    public function createStudio(Request $request)
    {
        // Валидация входных данных
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:studio,name', // Название обязательно, уникально и длиной до 255 символов
        ]);

        // Создание новой студии
        $studio = Studio::create([
            'name' => $validatedData['name'],
        ]);

        // Возвращаем успешный ответ с информацией о новой студии
        return response()->json([
            'message' => 'Студия успешно добавлена.',
            'studio' => $studio,
        ], 201);
    }

    public function updateStudio(Request $request, $id)
    {
        // Валидация входных данных
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:studio,name,' . $id, // Название обязательно, уникально (исключая текущую запись), длиной до 255 символов
        ]);

        // Поиск студии по ID
        $studio = Studio::find($id);

        // Проверка, существует ли студия с таким ID
        if (!$studio) {
            return response()->json([
                'message' => 'Студия не найдена.',
            ], 404);
        }

        // Обновление названия студии
        $studio->name = $validatedData['name'];

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

