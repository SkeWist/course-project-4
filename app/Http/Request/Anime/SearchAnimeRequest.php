<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchAnimeRequest extends FormRequest
{
    /**
     * Определяет, может ли пользователь делать этот запрос.
     */
    public function authorize(): bool
    {
        return true; // Поменяйте на свою логику, если требуется авторизация
    }

    /**
     * Правила валидации для запроса.
     */
    public function rules(): array
    {
        return [
            'keyword' => 'nullable|string|max:255', // Ключевое слово
            'genre' => 'nullable|exists:genres,name', // Жанр должен существовать в таблице genres
            'studio' => 'nullable|exists:studios,name', // Студия должна существовать в таблице studios
            'age_rating' => 'nullable|exists:age_ratings,name', // Возрастной рейтинг должен существовать
            'anime_type' => 'nullable|exists:anime_types,name', // Тип аниме должен существовать
        ];
    }

    /**
     * Сообщения об ошибках валидации.
     */
    public function messages(): array
    {
        return [
            'genre.exists' => 'Указанный жанр не существует.',
            'studio.exists' => 'Указанная студия не найдена.',
            'age_rating.exists' => 'Возрастной рейтинг указан неверно.',
            'anime_type.exists' => 'Тип аниме указан неверно.',
        ];
    }
}
