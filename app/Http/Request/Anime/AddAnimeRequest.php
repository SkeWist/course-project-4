<?php

namespace App\Http\Request\Anime;

use App\Http\Request\ApiRequest;

class AddAnimeRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|min:3|max:255',
            'description' => 'required|string',
            'studio_id' => 'required|exists:studios,id',
            'age_rating_id' => 'required|exists:age_ratings,id',
            'anime_type_id' => 'nullable|exists:anime_types,id',
            'episode_count' => 'required|integer|min:1',
            'rating' => 'required|numeric|min:0|max:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'release_year' => 'required|integer|min:1900|max:' . date('Y'),
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Поле "Название" обязательно для заполнения.',
            'title.string' => 'Поле "Название" должно быть строкой.',
            'title.min' => 'Название должно содержать не менее 3 символов.',
            'description.required' => 'Поле "Описание" обязательно для заполнения.',
            'studio_id.required' => 'Поле "Студия" обязательно для заполнения.',
            'studio_id.exists' => 'Выбранная студия не существует.',
            'age_rating_id.required' => 'Поле "Возрастной рейтинг" обязательно для заполнения.',
            'age_rating_id.exists' => 'Выбранный возрастной рейтинг не существует.',
            'episode_count.required' => 'Поле "Количество эпизодов" обязательно для заполнения.',
            'episode_count.integer' => 'Количество эпизодов должно быть целым числом.',
            'rating.required' => 'Поле "Рейтинг" обязательно для заполнения.',
            'rating.numeric' => 'Поле "Рейтинг" должно быть числом.',
            'release_year.required' => 'Поле "Год выпуска" обязательно для заполнения.',
            'release_year.integer' => 'Год выпуска должен быть числом.',
            'release_year.min' => 'Год выпуска не может быть раньше 1900.',
            'release_year.max' => 'Год выпуска не может быть позже текущего года.',
        ];
    }
}
