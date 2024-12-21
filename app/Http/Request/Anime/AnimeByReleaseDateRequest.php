<?php

namespace App\Http\Request\Anime;

use App\Http\Request\ApiRequest;

class AnimeByReleaseDateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules()
    {
        return [
            'release_year' => 'required|integer|min:1900|max:' . date('Y'),
        ];
    }

    public function messages(): array
    {
        return [
            'release_year.required' => 'Поле "Год выпуска" обязательно для заполнения.',
            'release_year.integer' => 'Поле "Год выпуска" должно быть числом.',
            'release_year.min' => 'Год выпуска не может быть раньше 1900.',
            'release_year.max' => 'Год выпуска не может быть позже текущего года.',
        ];
    }
}
