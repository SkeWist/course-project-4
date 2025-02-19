<?php

namespace App\Http\Controllers;

use App\Models\AgeRating;
use App\Http\Request\AgeRating\AgeRatingRequest;
use App\Models\AnimeGenre;
use Illuminate\Http\Request;

class AnimeGenreController extends Controller
{
    public function store(Request $request)
    {
        // Валидация входных данных
        $request->validate([
            'anime_id' => 'required|exists:animes,id',
            'genre_ids' => 'required|array', // Обязательно, чтобы был массив жанров
            'genre_ids.*' => 'exists:genres,id', // Каждый жанр должен быть существующим
        ]);

        // Получаем anime_id и genre_ids из запроса
        $animeId = $request->anime_id;
        $genreIds = $request->genre_ids;

        // Создаем записи для вставки в таблицу anime_genres
        $animeGenres = [];
        foreach ($genreIds as $genreId) {
            $animeGenres[] = [
                'anime_id' => $animeId,
                'genre_id' => $genreId,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Вставляем все записи сразу в базу
        AnimeGenre::insert($animeGenres);

        return response()->json(['message' => 'Жанры успешно добавлены к аниме.'], 201);
    }
}
