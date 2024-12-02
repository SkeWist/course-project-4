<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\RandomAnime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AgeRatingController;
use App\Http\Controllers\AnimeTypeController;

// Аутентификация
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

// Пользовательские данные
Route::middleware('auth:sanctum')->get('/user', [UserController::class, 'getUser']);
Route::middleware('auth:sanctum')->post('/user/profile', [UserController::class, 'updateProfile']);

// Аниме
Route::get('/anime', [AnimeController::class, 'index']);
Route::get('/anime/{animeId}', [AnimeController::class, 'show']);
Route::get('/anime/year/{year}', [AnimeController::class, 'getAnimeByYear']);
Route::get('/anime_types', [AnimeTypeController::class, 'index']);
Route::get('/anime/year/{year}', [AnimeController::class, 'getAnimeByYear']);
Route::get('/anime/search', [AnimeController::class, 'searchAnime'])->name('anime.search');
Route::get('/anime/{id}/gallery', [AnimeController::class, 'getGalleryImages']);

// Дополнительные ресурсы
Route::get('/genres', [GenreController::class, 'index']);
Route::get('/studios', [StudioController::class, 'index']);
Route::get('/age_ratings', [AgeRatingController::class, 'index']);

// Администрирование (требуется аутентификация)
Route::prefix('admin')->middleware('auth:sanctum')->group(function () {
    // Управление аниме
    Route::post('/anime', [AnimeController::class, 'addAnime']);
    Route::post('/anime/{animeId}', [AnimeController::class, 'editAnime']);
    Route::delete('/anime/{animeId}', [AnimeController::class, 'deleteAnime']);
    // Управление Галерей
    Route::post('/gallery/{anime_id}/add', [GalleryController::class, 'addGalleryImages']);
    Route::get('/gallery/{anime_id}', [GalleryController::class, 'getGalleryImages']);
    Route::delete('/gallery/frame/{imageId}', [GalleryController::class, 'deleteFrame']);
    // Управление персонажами
    Route::post('/character/add', [CharacterController::class, 'createCharacter']);
    Route::post('/character/{characterId}/update', [CharacterController::class, 'updateCharacter']);
    Route::delete('/characters/{characterId}/delete', [CharacterController::class, 'destroy']);
    // Управление жанрами
    Route::post('/genres/add', [GenreController::class, 'addGenre']);
    Route::post('/genre/{id}', [GenreController::class, 'updateGenre']);
    Route::delete('/genre/{id}', [GenreController::class, 'deleteGenre']);
    //Взаимодействие с пользователями
    Route::get('/users', [UserController::class, 'index']);
    // Управление студиями
    Route::post('/studio/add', [StudioController::class, 'createStudio']);
    Route::post('/studio/{id}/update', [StudioController::class, 'updateStudio']);
    Route::delete('/studio/{id}/delete', [StudioController::class, 'deleteStudio']);
    // Управление возрастным рейтингом
    Route::post('/age-ratings/add', [AgeRatingController::class, 'createAgeRating']);
    Route::post('/age-ratings/{id}/update', [AgeRatingController::class, 'updateAgeRating']);
    Route::delete('/age-ratings/{id}/delete', [AgeRatingController::class, 'deleteAgeRating']);

    Route::post('/anime-types/add', [AnimeTypeController::class, 'createAnimeType']);
    Route::post('/anime-types/{id}/update', [AnimeTypeController::class, 'updateAnimeType']);
    Route::delete('/anime-types/{id}/delete', [AnimeTypeController::class, 'deleteAnimeType']);
});
