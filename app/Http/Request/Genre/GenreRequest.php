<?php

namespace App\Http\Request\Genre;

use Illuminate\Foundation\Http\FormRequest;

class GenreRequest extends FormRequest
{
    /**
     * Определяет, может ли пользователь делать этот запрос.
     */
    public function authorize(): bool
    {
        return true; // Здесь можно добавить логику авторизации, если требуется
    }

    /**
     * Правила валидации для запроса.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:genre,name', // Название жанра должно быть уникальным
        ];
    }

    /**
     * Сообщения об ошибках валидации.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Поле "Название жанра" обязательно для заполнения.',
            'name.string' => 'Название жанра должно быть строкой.',
            'name.max' => 'Название жанра не может превышать 255 символов.',
            'name.unique' => 'Жанр с таким названием уже существует.',
        ];
    }
}
