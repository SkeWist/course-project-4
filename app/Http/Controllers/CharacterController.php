<?php

namespace App\Http\Controllers;

use App\Http\Request\Character\CharacterStoreRequest;
use App\Http\Request\Character\CharacterUpdateRequest;
use App\Models\Character;
use App\Models\Anime;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'anime_id'    => 'required|exists:anime,id',
            'audio_path'  => 'nullable|string', // Добавлено для аудиодорожек
        ]);

        $character = Character::create($validatedData);

        return response()->json([
            'message' => 'Персонаж успешно создан.',
            'data'    => $character,
        ], 201);
    }
    public function createCharacter(CharacterStoreRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $audioPath = $request->hasFile('audio')
                ? $request->file('audio')->store('character_audio', 'public')
                : null;

            $imagePath = $request->hasFile('image')
                ? $request->file('image')->store('character_images', 'public')
                : null;

            $character = Character::create([
                'name'        => $validatedData['name'],
                'voice_actor' => $validatedData['voice_actor'],
                'description' => $validatedData['description'] ?? null,
                'anime_id'    => $validatedData['anime_id'],
                'audio_path'  => $audioPath,
                'image_path'  => $imagePath, // Сохраняем путь к изображению
            ]);

            return response()->json([
                'message' => 'Персонаж успешно создан!',
                'character' => [
                    'id'          => $character->id,
                    'name'        => $character->name,
                    'voice_actor' => $character->voice_actor,
                    'description' => $character->description,
                    'anime_id'    => $character->anime_id,
                    'audio_url'   => $audioPath
                        ? asset('storage/' . $audioPath)
                        : null,
                    'image_url'   => $imagePath
                        ? asset('storage/' . $imagePath)
                        : null, // Формируем ссылку на изображение
                ],
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Произошла ошибка: ' . $e->getMessage(),
            ], 500);
        }
    }
    public function updateCharacter(CharacterUpdateRequest $request, $id)
    {
        // Поиск персонажа
        $character = Character::find($id);

        if (!$character) {
            return response()->json(['message' => 'Персонаж не найден.'], 404);
        }

        $character->update($request->only(['name', 'voice_actor', 'description', 'anime_id', 'audio_path', 'image_path']));

        return response()->json([
            'message' => 'Персонаж успешно обновлён.',
            'character' => $character
        ], 200);
    }

    public function destroy($characterId)
    {
        $character = Character::find($characterId);

        if (!$character) {
            return response()->json([
                'message' => 'Персонаж не найден.'
            ], 404);
        }

        $character->delete();

        return response()->json([
            'message' => 'Персонаж успешно удалён.'
        ], 200);
    }
}
