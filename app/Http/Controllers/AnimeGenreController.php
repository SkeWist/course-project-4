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
            'genre_id' => 'required|exists:genres,id',
        ]);

        // Добавляем запись в промежуточную таблицу
        $animeGenre = new AnimeGenre();
        $animeGenre->anime_id = $request->anime_id;
        $animeGenre->genre_id = $request->genre_id;
        $animeGenre->save();

        return response()->json(['message' => 'Жанр добавлен успешно'], 201);
    }
}
