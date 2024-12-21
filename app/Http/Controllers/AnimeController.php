<?php

namespace App\Http\Controllers;

use App\Http\Request\Anime\AnimeListRequest;
use App\Http\Request\Anime\AddAnimeRequest;
use App\Http\Request\Anime\AnimeByReleaseDateRequest;
use App\Http\Request\Anime\DeleteAnimeRequest;
use App\Http\Request\Anime\ShowAnimeRequest;
use App\Http\Request\Anime\UpdateAnimeRequest;
use App\Http\Requests\SearchAnimeRequest;
use App\Http\Controllers\AuthController;
use App\Models\Anime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnimeController extends Controller
{
    /**
     * Получение списка аниме с фильтрацией, сортировкой и пагинацией.
     */
    public function index(AnimeListRequest $request)
    {
        $query = Anime::with(['genre', 'studio', 'ageRating']);

        // Применение фильтров
        $this->applyFilters($query, $request);

        // Применение сортировки
        $this->applySorting($query, $request);

        $perPage = $request->get('per_page', 15);
        $anime = $query->paginate($perPage);

        return response()->json($anime);
    }
    public function show($animeId)
    {
        try {
            $anime = Anime::with(['studio', 'ageRating', 'genre', 'animeType', 'characters'])->findOrFail($animeId);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Аниме с таким идентификатором не найдено.',
            ], 404);
        }

        return response()->json([
            'anime' => [
                'id' => $anime->id,
                'title' => $anime->title,
                'description' => $anime->description,
                'studio' => $anime->studio?->name ?? 'Не указано',
                'rating' => $anime->rating,
                'genre' => $anime->genre ? $anime->genre->pluck('name') : [], // Получаем жанры
                'image_url' => asset('storage/' . $anime->image_url),
                'age_rating' => $anime->ageRating?->name ?? 'Не указано',
                'anime_type' => $anime->animeType?->name ?? 'Не указано',
                'episode_count' => $anime->episode_count,
                'character' => $anime->characters->map(function ($character) {
                    return [
                        'name' => $character->name,
                        'voice_actor' => $character->voice_actor,
                        'description' => $character->description,
                        'audio_path' => $character->audio_path,
                        'image_url' => asset('storage/' . $character->image_url),
                    ];
                }),
            ],
        ]);
    }

    private function transformAnime($anime)
    {
        return [
            'id' => $anime->id,
            'title' => $anime->title,
            'description' => $anime->description,
            'studio' => $anime->studio->name ?? null,
            'rating' => $anime->ageRating->name ?? null,
            'genre' => $anime->genre->pluck('name')->toArray(),
            'image_url' => asset('storage/' . $anime->image_url),
        ];
    }
    private function applySorting($query, $request)
    {
        if ($request->filled('sort_by') && in_array($request->sort_by, ['title', 'release_date', 'rating'])) {
            $query->orderBy($request->sort_by, $request->get('sort_order', 'asc'));
        }
    }
    public function getAnimeByYear($year)
    {
        $animeList = Anime::where('release_year', $year)->get();

        if ($animeList->isEmpty()) {
            return response()->json(['message' => "Аниме, выпущенные в $year году, не найдены."], 404);
        }

        return response()->json($animeList->map(fn($anime) => $this->transformAnime($anime)), 200);
    }
    public function deleteAnime(Request $request, $animeId)
    {
        $anime = Anime::findOrFail($animeId);

        if ($anime->image_url && Storage::disk('public')->exists($anime->image_url)) {
            Storage::disk('public')->delete($anime->image_url);
        }

        $anime->delete();

        return response()->json(['message' => 'Аниме успешно удалено.'], 200);
    }
    public function searchAnime(SearchAnimeRequest $request)
    {
        // Данные из запроса
        $keyword = $request->input('keyword');
        $genre = $request->input('genre');
        $studio = $request->input('studio');
        $ageRating = $request->input('age_rating');
        $animeType = $request->input('anime_type');

        // Формируем запрос к базе данных
        $query = Anime::with(['studio', 'ageRating', 'animeType', 'genre']);

        // Фильтрация по жанру
        if ($genre) {
            $query->whereHas('genres', function ($q) use ($genre) {
                $q->where('name', $genre);
            });
        }
        // Фильтрация по студии
        if ($studio) {
            $query->whereHas('studios', function ($q) use ($studio) {
                $q->where('name', $studio);
            });
        }
        // Фильтрация по возрастному рейтингу
        if ($ageRating) {
            $query->whereHas('ageRatings', function ($q) use ($ageRating) {
                $q->where('name', $ageRating);
            });
        }
        // Фильтрация по типу аниме (по name)
        if ($animeType) {
            $query->whereHas('animeTypes', function ($q) use ($animeType) {
                $q->where('name', $animeType);  // точное совпадение имени
            });
        }

        $animeList = $query->get();

        if ($animeList->isEmpty()) {
            return response()->json(['message' => 'Аниме не найдено.'], 404);
        }

        return response()->json($animeList->map(fn($anime) => $this->transformAnime($anime)), 200);
    }


    public function addAnime(AddAnimeRequest $request)
    {
        $imagePath = $request->hasFile('image')
            ? $request->file('image')->store('anime_images', 'public')
            : null;

        $anime = Anime::create(array_merge($request->validated(), ['image_url' => $imagePath]));

        return response()->json(['message' => 'Аниме успешно добавлено!', 'anime_id' => $anime->id], 201);
    }
    public function editAnime(UpdateAnimeRequest $request, $animeId)
    {
        $anime = Anime::findOrFail($animeId);

        if ($request->hasFile('image')) {
            if ($anime->image_url && Storage::disk('public')->exists($anime->image_url)) {
                Storage::disk('public')->delete($anime->image_url);
            }

            $anime->image_url = $request->file('image')->store('anime_images', 'public');
        }

        $anime->update($request->validated());

        return response()->json(['message' => 'Аниме успешно обновлено.', 'anime' => $anime], 200);
    }
    public function getGenre($anime_id)
    {
        // Проверка существования аниме
        $anime = Anime::find($anime_id);
        if (!$anime) {
            return response()->json(['message' => 'Аниме не найдено'], 404);
        }
        // Получение жанров через связь
        $genres = $anime->genre()->get([]);
        return response()->json([
            'genre' => $anime->genre ? $anime->genre->pluck('name') : [], // Получаем жанры
        ], 200);
    }
    private function applyFilters($query, $request)
    {
        if ($request->filled('genre')) {
            $query->whereHas('genres', fn($q) => $q->where('name', $request->input('genre')));
        }

        if ($request->filled('studio')) {
            $query->whereHas('studios', fn($q) => $q->where('name', $request->input('studio')));
        }

        if ($request->filled('age_rating')) {
            $query->whereHas('ageRatings', fn($q) => $q->where('name', $request->input('age_rating')));
        }
        if ($request->filled('anime_type')) {
            $query->whereHas('animeTypes', fn($q) => $q->where('name', $request->input('anime_type')));
        }
    }
}
