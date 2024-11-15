<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\StudioController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', [UserController::class, 'getUser']);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
Route::get('/anime', [AnimeController::class, 'index']);
Route::get('/anime/filter', [AnimeController::class, 'filter']);
Route::get('/character/{characterId}/audio', [AnimeController::class, 'getCharacterAudio']);
Route::post('/user/profile', [UserController::class, 'updateProfile']);
Route::get('/anime/{animeId}', [AnimeController::class, 'show']);
Route::get('/anime/random', [AnimeController::class, 'random']);
Route::get('/genres', [AnimeController::class, 'getGenres']);
Route::get('/anime-types', [AnimeController::class, 'getAnimeTypes']);
Route::get('/studios', [AnimeController::class, 'getStudios']);
Route::get('/age_rating', [AnimeController::class, 'getAgeRatings']);
Route::get('/anime/year/{year}', [AnimeController::class, 'getAnimeByYear']);
Route::post('/admin/studios', [StudioController::class, 'addStudio']);
Route::get('/anime/{animeId}', [AnimeController::class, 'show'])->name('anime.show');
Route::prefix('admin')->middleware('auth:api')->group(function () {
    Route::get('/anime', [AnimeController::class, 'index'])->name('admin.anime.index');
    Route::post('/anime', [AnimeController::class, 'store'])->name('admin.anime.store');
    Route::get('/anime/{animeId}', [AnimeController::class, 'show'])->name('admin.anime.show');
    Route::put('/anime/{animeId}', [AnimeController::class, 'update'])->name('admin.anime.update');
    Route::delete('/anime/{animeId}', [AnimeController::class, 'destroy'])->name('admin.anime.destroy');
});
