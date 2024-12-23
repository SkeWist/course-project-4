<?php

namespace App\Http\Request\Anime;

use App\Http\Request\ApiRequest;

class AnimeListRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'genre'        => 'nullable|string|exists:genres,name', // Фильтрация по жанру (опционально)
            'studio'       => 'nullable|string|exists:studios,name', // Фильтрация по студии (опционально)
            'age_rating'   => 'nullable|string|exists:age_ratings,name', // Фильтрация по возрастному рейтингу (опционально)
            'sort_by'      => 'nullable|string|in:title,rating,created_at', // Поле сортировки
            'sort_order'   => 'nullable|string|in:asc,desc', // Порядок сортировки
        ];
    }
}
