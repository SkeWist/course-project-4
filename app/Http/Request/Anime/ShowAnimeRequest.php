<?php

namespace App\Http\Request\Anime;

use Illuminate\Foundation\Http\FormRequest;

class ShowAnimeRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Разрешаем доступ всем пользователям
    }

    public function rules()
    {
        return [
            'animeId' => 'required|integer|exists:animes,id', // Проверяем, что animeId существует в таблице anime
        ];
    }

    public function messages()
    {
        return [
            'animeId.required' => 'Идентификатор аниме обязателен.',
            'animeId.integer' => 'Идентификатор аниме должен быть числом.',
            'animeId.exists' => 'Аниме с таким идентификатором не найдено.',
        ];
    }
}
