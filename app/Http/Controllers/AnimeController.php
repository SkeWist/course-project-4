<?php

namespace App\Http\Controllers;

use App\Http\Request\Anime\AnimeListRequest;
use App\Models\AgeRating;
use App\Models\Anime;
use App\Models\Genre;
use App\Models\Studio;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    public function index(AnimeListRequest $request)
    {
        $query = Anime::with('genres'); // Подгружаем связанные жанры

        // Фильтрация
        if ($request->filled('genre')) {
            $query->whereHas('genres', function ($q) use ($request) {
                $q->where('name', $request->genre);
            });
        }

        if ($request->filled('studio')) {
            $query->whereHas('studio', function ($q) use ($request) {
                $q->where('name', $request->studio);
            });
        }

        if ($request->filled('age_rating')) {
            $query->whereHas('ageRating', function ($q) use ($request) {
                $q->where('name', $request->age_rating);
            });
        }

        // Сортировка
        if ($request->filled('sort_by')) {
            $query->orderBy($request->sort_by, $request->sort_order ?? 'asc');
        }

        // Пагинация
        $animes = $query->paginate($request->get('per_page', 15));

        return response()->json($animes);
    }

    public function show($animeId)
    {
        // Загрузка аниме вместе с персонажами
        $anime = Anime::with('characters')->find($animeId);

        if (!$anime) {
            return response()->json(['message' => 'Аниме не найдено.'], 404);
        }

        // Форматируем персонажей
        $characters = $anime->characters->map(function ($character) {
            return [
                'id'           => $character->id,
                'name'         => $character->name,
                'voice_actor'  => $character->voice_actor,
                'description'  => $character->description,
                'audio_url'    => $character->audio_path ? asset('storage/' . $character->audio_path) : null,
            ];
        });

        return response()->json([
            'anime' => [
                'id'           => $anime->id,
                'title'        => $anime->title,
                'description'  => $anime->description,
                'studio'       => $anime->studio->name,
                'rating'       => $anime->rating,
                'genre'        => $anime->genre,
                'image_url'    => $anime->image_url,
                'age_rating'   => $anime->ageRating->name,
                'anime_type'   => $anime->anime_type,
                'release_date' => $anime->release_date,
                'episode_count'=> $anime->episode_count,
            ],
            'characters' => $characters,
        ], 200);
    }

    public function random()
    {
        $anime = Anime::inRandomOrder()->first(); // Получаем случайное аниме

        if (!$anime) {
            return response()->json(['message' => 'Аниме не найдено.'], 404);
        }

        return response()->json($anime, 200);
    }

    public function getGenres()
    {
        $genres = Genre::all(); // Предполагается, что у вас есть модель Genre

        return response()->json($genres, 200);
    }

    public function getStudios()
    {
        $studios = Studio::all(); // Предполагается, что у вас есть модель Studio

        return response()->json($studios, 200);
    }

    public function getAgeRatings()
    {
        $ageRatings = AgeRating::all(); // Предполагается, что у вас есть модель AgeRating

        return response()->json($ageRatings, 200);
    }

    public function getAnimeByYear($year)
    {
        $animes = Anime::whereYear('release_date', $year)->get(); // Предполагается, что у вас есть поле release_date

        return response()->json($animes, 200);
    }

    public function searchAnime(Request $request)
    {
        $keyword = $request->query('keyword');
        $animes = Anime::where('title', 'LIKE', "%$keyword%")
            ->orWhere('description', 'LIKE', "%$keyword%")
            ->get();

        return response()->json($animes, 200);
    }

    public function addAnime(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'description' => 'required|string',
            'studio' => 'required|string|min:3|max:32',
            'rating' => 'required|string|min:2|max:3',
            'image_url' => 'required|url',
            'age_rating_id' => 'required|exists:age_ratings,id', // Ссылка на возрастной рейтинг
            'anime_type' => 'required|string|in:Фильм,Сериал,Короткометражка', // Тип аниме как строка
            'episode_count' => 'required|integer|min:1', // Количество серий
        ]);

        $anime = Anime::create([
            'title' => $request->title,
            'description' => $request->description,
            'studio' => $request->studio,
            'rating' => $request->rating,
            'image_url' => $request->image_url,
            'age_rating_id' => $request->age_rating_id,
            'anime_type' => $request->anime_type, // Сохраняем тип аниме
            'episode_count' => $request->episode_count, // Добавляем количество серий
        ]);

        return response()->json([
            'message' => 'Аниме успешно добавлено!',
            'anime_id' => $anime->id
        ], 201);
    }

    public function editAnime(Request $request, $animeId)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'description' => 'required|string',
            'studio' => 'required|string|min:3|max:32',
            'rating' => 'required|string|min:2|max:3',
            'image_url' => 'required|url',
            'age_rating_id' => 'required|exists:age_ratings,id', // Ссылка на возрастной рейтинг
            'anime_type' => 'required|string|in:Фильм,Сериал,Короткометражка', // Тип аниме как строка
            'episode_count' => 'nullable|integer|min:1', // Количество серий
        ]);

        $anime = Anime::find($animeId);

        if (!$anime) {
            return response()->json(['message' => 'Аниме не найдено.'], 404);
        }

        $anime->update([
            'title' => $request->title,
            'description' => $request->description,
            'studio' => $request->studio,
            'rating' => $request->rating,
            'image_url' => $request->image_url,
            'age_rating_id' => $request->age_rating_id,
            'anime_type' => $request->anime_type, // Обновляем тип аниме
            'episode_count' => $request->episode_count ?? $anime->episode_count, // Обновление количества серий, если оно задано
        ]);

        return response()->json(['message' => 'Аниме успешно обновлено!'], 200);
    }
}
