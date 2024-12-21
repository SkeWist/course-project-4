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
        $genre = Genre::select('id', 'name')->get();

        return response()->json($genre, 200);
    }

    public function show($id)
    {
        $genre = Genre::findOrFail($id);
        return response()->json($genre, 200);
    }

    public function store(GenreRequest $request): JsonResponse
    {
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
        $validated = $request->validate([
            'name' => 'required|string|max:32|unique:genres,name', // Имя жанра должно быть уникальным
        ]);

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
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'message' => 'Жанр не найден.',
            ], 404);
        }

        $genre->name = $request->input('name');
        $genre->save();

        return response()->json([
            'message' => 'Жанр успешно обновлен.',
            'genre' => $genre,
        ], 200);
    }
    public function deleteGenre($id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'message' => 'Жанр не найден.',
            ], 404);
        }

        $genre->delete();

        return response()->json([
            'message' => 'Жанр успешно удалён.',
        ], 200);
    }

}
