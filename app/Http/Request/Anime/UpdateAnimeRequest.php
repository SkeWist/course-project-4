<?php

namespace App\Http\Request\Anime;

use App\Http\Request\ApiRequest;

class UpdateAnimeRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules()
    {
        return [
            'title' => 'sometimes|string|min:3|max:255',
            'description' => 'sometimes|string',
            'studio_id' => 'sometimes|exists:studios,id',
            'age_rating_id' => 'sometimes|exists:age_ratings,id',
            'anime_type_id' => 'nullable|exists:anime_types,id',
            'episode_count' => 'sometimes|integer|min:1',
            'rating' => 'sometimes|numeric|min:0|max:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'release_year' => 'sometimes|integer|min:1900|max:' . date('Y'),
        ];
    }

    public function messages(): array
    {
        return [
            'title.string' => 'Поле "Название" должно быть строкой.',
            'title.min' => 'Название должно содержать не менее :min символов.',
            'studio_id.exists' => 'Выбранная студия не существует.',
            'age_rating_id.exists' => 'Выбранный возрастной рейтинг не существует.',
            'release_year.integer' => 'Год выпуска должен быть числом.',
            'release_year.min' => 'Год выпуска не может быть раньше :min.',
            'release_year.max' => 'Год выпуска не может быть позже текущего года.',
        ];
    }
}
