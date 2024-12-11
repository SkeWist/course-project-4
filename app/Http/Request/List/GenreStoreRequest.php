<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenreStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Авторизация включена
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:genres,name',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Название жанра обязательно.',
            'name.string'   => 'Название жанра должно быть строкой.',
            'name.max'      => 'Название жанра не должно превышать 255 символов.',
            'name.unique'   => 'Такой жанр уже существует.',
        ];
    }
}
