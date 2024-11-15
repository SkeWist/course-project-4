<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function index(): JsonResponse
    {
        $characters = Character::all();
        return response()->json([
            'message' => 'Список персонажей получен.',
            'data'    => $characters,
        ], 200);
    }
    public function show(int $id): JsonResponse
    {
        $character = Character::find($id);

        if (!$character) {
            return response()->json(['message' => 'Персонаж не найден.'], 404);
        }

        return response()->json([
            'message' => 'Персонаж успешно получен.',
            'data'    => $character,
        ], 200);
    }
    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name'        => 'required|string|max:255',
            'voice_actor' => 'required|string|max:255',
            'description' => 'nullable|string',
            'anime_id'    => 'required|exists:animes,id',
            'audio_path'  => 'nullable|string', // Добавлено для аудиодорожек
        ]);

        $character = Character::create($validatedData);

        return response()->json([
            'message' => 'Персонаж успешно создан.',
            'data'    => $character,
        ], 201);
    }
    public function update(Request $request, int $id): JsonResponse
    {
        $validatedData = $request->validate([
            'name'        => 'required|string|max:255',
            'voice_actor' => 'required|string|max:255',
            'description' => 'nullable|string',
            'anime_id'    => 'required|exists:animes,id',
            'audio_path'  => 'nullable|string', // Добавлено для аудиодорожек
        ]);

        $character = Character::find($id);

        if (!$character) {
            return response()->json(['message' => 'Персонаж не найден.'], 404);
        }

        $character->update($validatedData);

        return response()->json([
            'message' => 'Персонаж успешно обновлен.',
            'data'    => $character,
        ], 200);
    }
    public function destroy(int $id): JsonResponse
    {
        $character = Character::find($id);

        if (!$character) {
            return response()->json(['message' => 'Персонаж не найден.'], 404);
        }

        $character->delete();

        return response()->json([
            'message' => 'Персонаж успешно удалён.',
        ], 200);
    }
}
