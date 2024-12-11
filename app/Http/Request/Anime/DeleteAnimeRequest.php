<?php

namespace App\Http\Request\Anime;

use App\Http\Request\ApiRequest;

class DeleteAnimeRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'anime_id' => 'required|exists:animes,id',
        ];
    }

    public function messages(): array
    {
        return [
            'anime_id.required' => 'Поле "ID аниме" обязательно для заполнения.',
            'anime_id.exists' => 'Аниме с указанным ID не существует.',
        ];
    }
}
