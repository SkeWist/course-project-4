<?php

namespace App\Http\Controllers;
use App\Http\Request\Genre\GenreRequest;
use App\Http\Requests\GenreStoreRequest;
use App\Models\Gallery;
use App\Models\Genre;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class GenreController extends Controller
{
    public function index(): JsonResponse
    {
        // Получаем все жанры с только нужными полями
        $genre = Genre::select('id', 'name')->get();

        // Возвращаем результат в формате JSON
        return response()->json($genre, 200);
    }

    public function show($id) // Получение жанра по ID
    {
        $genre = Genre::findOrFail($id);
        return response()->json($genre, 200);
    }

    public function store(GenreRequest $request): JsonResponse
    {
        // Создаем жанр
        $genre = Genre::create([
            'name' => $request->input('name'),
        ]);

        return response()->json([
            'message' => 'Жанр успешно добавлен!',
            'genre' => $genre,
        ], 201);
    }

    public function addGenre(Request $request)
    {
        // Валидация входных данных
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:genre,name', // Имя жанра должно быть уникальным
        ]);

        // Создание нового жанра
        $genre = Genre::create([
            'name' => $validated['name'],
        ]);

        return response()->json([
            'message' => 'Жанр успешно добавлен.',
            'genre' => $genre,
        ], 201);
    }
    public function updateGenre(GenreRequest $request, $id): JsonResponse
    {
        // Поиск жанра по ID
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'message' => 'Жанр не найден.',
            ], 404);
        }

        // Обновление имени жанра
        $genre->name = $request->input('name');
        $genre->save();

        return response()->json([
            'message' => 'Жанр успешно обновлен.',
            'genre' => $genre,
        ], 200);
    }
    public function deleteGenre($id)
    {
        // Поиск жанра по ID в таблице genre
        $genre = Genre::find($id);

        // Проверка, существует ли жанр с таким ID
        if (!$genre) {
            return response()->json([
                'message' => 'Жанр не найден.',
            ], 404);
        }

        // Удаление жанра
        $genre->delete();

        // Возвращаем успешный ответ
        return response()->json([
            'message' => 'Жанр успешно удалён.',
        ], 200);
    }

}
